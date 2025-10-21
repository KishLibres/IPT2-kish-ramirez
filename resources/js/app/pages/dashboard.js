import { API } from '../api/client';

export async function initDashboard() {
  try {
    const s = await API.stats();
    const byId = id => document.getElementById(id);
    const set = (id, val) => { const el = byId(id); if (el) el.textContent = val; };
    set('stat-students', s.students);
    set('stat-faculty', s.faculty);
    set('stat-courses', s.courses);
    set('stat-departments', s.departments);
    set('stat-pending', s.pending_enrollments);
    set('stat-status', s.system_status);
    const year = document.getElementById('stat-year'); if (year) year.textContent = s.year;
  } catch (e) {
    console.error('Failed to load dashboard stats', e);
  }
  // Auto-refresh when page becomes visible or every 15s
  let timer = setInterval(async () => {
    try {
      const s = await API.stats();
      const byId = id => document.getElementById(id);
      const set = (id, val) => { const el = byId(id); if (el) el.textContent = val; };
      set('stat-students', s.students);
      set('stat-faculty', s.faculty);
      set('stat-courses', s.courses);
      set('stat-departments', s.departments);
      set('stat-pending', s.pending_enrollments);
      set('stat-status', s.system_status);
    } catch (e) { /* ignore transient errors */ }
  }, 15000);
  document.addEventListener('visibilitychange', async () => {
    if (document.visibilityState === 'visible') {
      try {
        const s = await API.stats();
        const byId = id => document.getElementById(id);
        const set = (id, val) => { const el = byId(id); if (el) el.textContent = val; };
        set('stat-students', s.students);
        set('stat-faculty', s.faculty);
        set('stat-courses', s.courses);
        set('stat-departments', s.departments);
        set('stat-pending', s.pending_enrollments);
        set('stat-status', s.system_status);
      } catch (e) { /* ignore */ }
    }
  });
}


