export function initSettings() {
  const buttons = Array.from(document.querySelectorAll('[data-panel]'));
  const panels = ['#panel-courses', '#panel-departments', '#panel-academic']
    .map(sel => document.querySelector(sel))
    .filter(Boolean);

  function activate(target) {
    panels.forEach(p => p.classList.add('d-none'));
    const el = document.querySelector(target);
    if (el) el.classList.remove('d-none');
    buttons.forEach(b => {
      if (b.getAttribute('data-panel') === target) {
        b.classList.remove('btn-outline-secondary');
        b.classList.add('btn-primary');
      } else {
        b.classList.add('btn-outline-secondary');
        b.classList.remove('btn-primary');
      }
    });
  }

  buttons.forEach(b => b.addEventListener('click', (ev) => { ev.preventDefault(); activate(b.getAttribute('data-panel')); }));
  // default
  activate('#panel-courses');

  // Render from API if tables exist
  renderCourses();
  renderDepartments();
  renderAcademicYears();

  // Save handlers
  const saveCourse = document.getElementById('saveCourseBtn');
  if (saveCourse) saveCourse.addEventListener('click', createCourse);
  const saveDept = document.getElementById('saveDeptBtn');
  if (saveDept) saveDept.addEventListener('click', createDept);
  const saveAy = document.getElementById('saveAyBtn');
  if (saveAy) saveAy.addEventListener('click', createAy);

  // Prevent native form submits (use AJAX instead)
  const fCourse = document.getElementById('addCourseForm');
  if (fCourse) fCourse.addEventListener('submit', function(ev){ ev.preventDefault(); createCourse(); });
  const fDept = document.getElementById('addDeptForm');
  if (fDept) fDept.addEventListener('submit', function(ev){ ev.preventDefault(); createDept(); });
  const fAy = document.getElementById('addAyForm');
  if (fAy) fAy.addEventListener('submit', function(ev){ ev.preventDefault(); createAy(); });

  // Global delegated fallback: ensures clicks work even if listeners miss
  document.addEventListener('click', function (e) {
    const panelBtn = e.target.closest('[data-panel]');
    if (panelBtn) {
      e.preventDefault();
      activate(panelBtn.getAttribute('data-panel'));
    }
  });
}

async function fetchJSON(url) {
  const res = await fetch(url, { headers: { 'Accept': 'application/json' }, cache: 'no-store' });
  if (!res.ok) throw new Error('Request failed: ' + res.status);
  return await res.json();
}

async function renderCourses() {
  const table = document.querySelector('#panel-courses table tbody');
  if (!table) return;
  try {
    const rows = await fetchJSON('/api/settings/courses');
    table.innerHTML = '';
    rows.forEach(r => {
      const tr = document.createElement('tr');
      tr.innerHTML = `<td>${r.code}</td><td>${r.name}</td><td>${r.department || '-'}</td><td>${badge(r.status)}</td><td>-</td>`;
      table.appendChild(tr);
    });
  } catch (_) {}
}

async function renderDepartments() {
  const table = document.querySelector('#panel-departments table tbody');
  if (!table) return;
  try {
    const rows = await fetchJSON('/api/settings/departments');
    table.innerHTML = '';
    rows.forEach(r => {
      const tr = document.createElement('tr');
      tr.innerHTML = `<td>${r.code}</td><td>${r.name}</td><td>${badge(r.status)}</td><td>-</td>`;
      table.appendChild(tr);
    });
  } catch (_) {}
}

async function renderAcademicYears() {
  const table = document.querySelector('#panel-academic table tbody');
  if (!table) return;
  try {
    const rows = await fetchJSON('/api/settings/academic-years');
    table.innerHTML = '';
    rows.forEach(r => {
      const tr = document.createElement('tr');
      tr.innerHTML = `<td>${r.year}</td><td>${badge(r.status)}</td><td>-</td>`;
      table.appendChild(tr);
    });
  } catch (_) {}
}

function badge(status) {
  return status === 'active' ? '<span class="status-badge status-active">Active</span>' : '<span class="status-badge status-inactive">Inactive</span>';
}

async function createCourse(){
  const form = document.getElementById('addCourseForm');
  const body = Object.fromEntries(new FormData(form).entries());
  const btn = document.getElementById('saveCourseBtn'); if (btn) btn.disabled = true;
  try {
    const res = await fetch('/api/settings/courses', { method: 'POST', headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' }, body: JSON.stringify(body) });
    if (!res.ok) {
      let msg = await res.text();
      try { const j = JSON.parse(msg); msg = j.message || JSON.stringify(j.errors || j); } catch(_){}
      throw new Error(msg || ('HTTP ' + res.status));
    }
    await renderCourses();
    const modalEl = document.getElementById('addCourseModal');
    if (modalEl) { modalEl.classList.remove('show'); modalEl.style.display='none'; document.querySelectorAll('.modal-backdrop').forEach(b=>b.remove()); document.body.classList.remove('modal-open'); }
    form.reset();
  } catch (e) { alert('Failed to add course: ' + (e && e.message ? e.message : '')); console.error(e); }
  finally { if (btn) btn.disabled = false; }
}

async function createDept(){
  const form = document.getElementById('addDeptForm');
  const body = Object.fromEntries(new FormData(form).entries());
  const btn = document.getElementById('saveDeptBtn'); if (btn) btn.disabled = true;
  try {
    const res = await fetch('/api/settings/departments', { method: 'POST', headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' }, body: JSON.stringify(body) });
    if (!res.ok) {
      let msg = await res.text();
      try { const j = JSON.parse(msg); msg = j.message || JSON.stringify(j.errors || j); } catch(_){}
      throw new Error(msg || ('HTTP ' + res.status));
    }
    await renderDepartments();
    const modalEl = document.getElementById('addDeptModal');
    if (modalEl) { modalEl.classList.remove('show'); modalEl.style.display='none'; document.querySelectorAll('.modal-backdrop').forEach(b=>b.remove()); document.body.classList.remove('modal-open'); }
    form.reset();
  } catch (e) { alert('Failed to add department: ' + (e && e.message ? e.message : '')); console.error(e); }
  finally { if (btn) btn.disabled = false; }
}

async function createAy(){
  const form = document.getElementById('addAyForm');
  const body = Object.fromEntries(new FormData(form).entries());
  const btn = document.getElementById('saveAyBtn'); if (btn) btn.disabled = true;
  try {
    const res = await fetch('/api/settings/academic-years', { method: 'POST', headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' }, body: JSON.stringify(body) });
    if (!res.ok) {
      let msg = await res.text();
      try { const j = JSON.parse(msg); msg = j.message || JSON.stringify(j.errors || j); } catch(_){}
      throw new Error(msg || ('HTTP ' + res.status));
    }
    await renderAcademicYears();
    const modalEl = document.getElementById('addAyModal');
    if (modalEl) { modalEl.classList.remove('show'); modalEl.style.display='none'; document.querySelectorAll('.modal-backdrop').forEach(b=>b.remove()); document.body.classList.remove('modal-open'); }
    form.reset();
  } catch (e) { alert('Failed to add academic year: ' + (e && e.message ? e.message : '')); console.error(e); }
  finally { if (btn) btn.disabled = false; }
}


