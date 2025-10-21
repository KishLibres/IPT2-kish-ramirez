export function renderFacultyRows(rows) {
  const tbody = document.querySelector('#facultyTable tbody');
  if (!tbody) return;
  tbody.innerHTML = '';
  for (const r of rows) {
    const tr = document.createElement('tr');
    tr.dataset.dept = r.department;
    tr.dataset.name = (r.name || '').toLowerCase();
    tr.dataset.status = r.status;
    tr.dataset.email = r.email || '';
    tr.innerHTML = `
      <td>${r.code || r.id}</td>
      <td>${r.name}</td>
      <td>${r.department || '-'}</td>
      <td>${r.status === 'active' ? '<span class="status-badge status-active">Active</span>' : '<span class="status-badge status-inactive">Inactive</span>'}</td>
      <td class="text-nowrap">
        <button data-id="${r.id}" class="btn btn-sm btn-outline-primary me-2 js-edit">Edit</button>
        <button data-id="${r.id}" class="btn btn-sm btn-outline-warning me-2 js-archive">${r.archived ? 'Restore' : 'Archive'}</button>
        <button data-id="${r.id}" class="btn btn-sm btn-outline-danger js-delete">Delete</button>
      </td>
    `;
    tbody.appendChild(tr);
  }
}


