import { API } from '../api/client';
import { showModal, hideModal, flashSuccess } from '../utils/dom';
import { renderStudentRows } from '../components/studentsTable';

// using shared dom utils

const renderRows = renderStudentRows;

export async function initStudentsPage() {
  try {
    const data = await API.students();
    renderRows(data);
  } catch (e) {
    console.error('Failed to load students', e);
  }

  const createBtn = document.getElementById('createStudentBtn');
  if (createBtn) {
    createBtn.addEventListener('click', async () => {
      const form = document.getElementById('addStudentForm');
      if (!form) return;
      const data = Object.fromEntries(new FormData(form).entries());
      const body = {
        student_no: data.student_no,
        name: `${data.first} ${data.last}`.trim(),
        email: data.email,
        course: '-',
        dept: '-',
        status: 'active',
      };
      try {
        await API.createStudent(body);
        const rows = await API.students();
        renderRows(rows);
        hideModal(document.getElementById('addStudentModal'));
        form.reset();
        flashSuccess('studentsFlash', 'Student created successfully.');
      } catch (err) {
        alert('Failed to create student: ' + (err && err.message ? err.message : ''));
        console.error(err);
      }
    });
  }

  const tbody = document.querySelector('#studentsTable tbody');
  if (tbody) {
    tbody.addEventListener('click', async (e) => {
      const del = e.target.closest('.js-delete');
      const arch = e.target.closest('.js-archive');
      const edit = e.target.closest('.js-edit');
      if (!del && !arch && !edit) return;
      const id = (del||arch||edit).getAttribute('data-id');
      if (!id) return;

      if (del) {
        if (!confirm('Delete this student?')) return;
        try {
          await API.deleteStudent(id);
          const rows = await API.students();
          renderRows(rows);
        } catch (err) {
          alert('Failed to delete');
          console.error(err);
        }
        return;
      }

      if (arch) {
        const row = arch.closest('tr');
        const isInactive = row && row.querySelector('.status-inactive');
        try {
          if (isInactive) {
            await API.restoreStudent(id);
          } else {
            // change to archive? since delete is now hard delete, call restore toggle only here by ignoring
            await API.updateStudent(id, { status: 'inactive' });
          }
          const rows = await API.students();
          renderRows(rows);
        } catch (err) {
          alert('Failed to update status');
          console.error(err);
        }
        return;
      }

      if (edit) {
        const row = edit.closest('tr');
        const form = document.getElementById('editStudentForm');
        if (row && form) {
          form.elements['id'].value = id;
          form.elements['name'].value = row.children[1].textContent.trim();
          form.elements['course'].value = row.children[2].textContent.trim();
          form.elements['dept'].value = row.children[3].textContent.trim();
          form.elements['status'].value = row.querySelector('.status-inactive') ? 'inactive' : 'active';
          // Map the year level cell (index 4)
          const yl = row.children[4] ? row.children[4].textContent.trim() : '';
          if (form.elements['year_level']) form.elements['year_level'].value = yl && yl !== '-' ? yl : '';
          const modalEl = document.getElementById('editStudentModal');
          showModal(modalEl);
        }
      }
    });
  }

  const saveBtn = document.getElementById('saveStudentBtn');
  if (saveBtn) {
    saveBtn.addEventListener('click', async () => {
      const form = document.getElementById('editStudentForm');
      const id = form.elements['id'].value;
      const body = Object.fromEntries(new FormData(form).entries());
      delete body.id;
      Object.keys(body).forEach(k => { if (body[k] === '') delete body[k]; });
      try {
        await API.updateStudent(id, body);
        const rows = await API.students();
        renderRows(rows);
        const modalEl = document.getElementById('editStudentModal');
        hideModal(modalEl);
        flashSuccess('studentsFlash', 'Student updated successfully.');
      } catch (err) {
        alert('Failed to save');
        console.error(err);
      }
    });
  }
}


