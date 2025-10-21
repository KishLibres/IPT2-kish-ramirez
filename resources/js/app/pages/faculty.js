import { API } from '../api/client';
import { showModal, hideModal } from '../utils/dom';
import { renderFacultyRows } from '../components/facultyTable';

const renderRows = renderFacultyRows;

export async function initFacultyPage() {
  try {
    const data = await API.faculty();
    renderRows(data);
  } catch (e) {
    console.error('Failed to load faculty', e);
  }

  const saveBtn = document.getElementById('saveFacultyBtn');
  if (saveBtn) {
    saveBtn.addEventListener('click', async () => {
      const form = document.getElementById('editFacultyForm');
      const id = form.elements['id'].value;
      const body = Object.fromEntries(new FormData(form).entries());
      delete body.id;
      Object.keys(body).forEach(k => { if (body[k] === '') delete body[k]; });
      try {
        await API.updateFaculty(id, body);
        const data = await API.faculty();
        renderRows(data);
        const modalEl = document.getElementById('editFacultyModal');
        hideModal(modalEl);
      } catch (err) {
        alert('Failed to save');
        console.error(err);
      }
    });
  }
  const createBtn = document.getElementById('createFacultyBtn');
  if (createBtn) {
    createBtn.addEventListener('click', async () => {
      const form = document.getElementById('addFacultyForm');
      if (!form) return;
      const body = Object.fromEntries(new FormData(form).entries());
      try {
        await API.createFaculty(body);
        // refresh table
        const data = await API.faculty();
        renderRows(data);
        // close modal
        const modalEl = document.getElementById('addFacultyModal');
        hideModal(modalEl);
        form.reset();
        const flash = document.getElementById('facultyFlash');
        if (flash) { flash.className = 'alert alert-success'; flash.textContent = 'Faculty created successfully.'; }
      } catch (err) {
        alert('Failed to create faculty: ' + (err && err.message ? err.message : ''));
        console.error(err);
      }
    });
  }

  // delegated delete
  const tbody = document.querySelector('#facultyTable tbody');
  if (tbody) {
    tbody.addEventListener('click', async (e) => {
      const del = e.target.closest('.js-delete');
      const arch = e.target.closest('.js-archive');
      const edit = e.target.closest('.js-edit');
      if (!del && !arch && !edit) return;
      const id = (del||arch||edit).getAttribute('data-id');
      if (!id) return;

      if (del) {
        if (!confirm('Delete this faculty?')) return;
        try {
          await API.deleteFaculty(id);
          const data = await API.faculty();
          renderRows(data);
        } catch (err) {
          alert('Failed to delete');
          console.error(err);
        }
        return;
      }

      if (arch) {
        // toggle status only
        const row = arch.closest('tr');
        const isInactive = row && row.querySelector('.status-inactive');
        try {
          if (isInactive) {
            await API.updateFaculty(id, { status: 'active' });
          } else {
            await API.updateFaculty(id, { status: 'inactive' });
          }
          const data = await API.faculty();
          renderRows(data);
        } catch (err) {
          alert('Failed to update status');
          console.error(err);
        }
        return;
      }

      if (edit) {
        const row = edit.closest('tr');
        const form = document.getElementById('editFacultyForm');
        if (row && form) {
          form.elements['id'].value = id;
          form.elements['name'].value = row.children[1].textContent.trim();
          form.elements['department'].value = row.children[2].textContent.trim();
          form.elements['email'].value = row.dataset.email || '';
          form.elements['status'].value = row.querySelector('.status-inactive') ? 'inactive' : 'active';
          const modalEl = document.getElementById('editFacultyModal');
          showModal(modalEl);
        }
      }
    });
  }
}


