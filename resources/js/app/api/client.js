export async function getJSON(url) {
  const res = await fetch(url, { headers: { 'Accept': 'application/json' } });
  if (!res.ok) throw new Error('Request failed: ' + res.status);
  return await res.json();
}

async function postJSON(url, body) {
  const res = await fetch(url, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
    body: JSON.stringify(body)
  });
  const text = await res.text();
  let data;
  try { data = text ? JSON.parse(text) : null; } catch (e) { /* ignore */ }
  if (!res.ok) {
    const msg = (data && (data.message || JSON.stringify(data))) || text || ('HTTP ' + res.status);
    throw new Error(msg);
  }
  return data;
}

async function putJSON(url, body) {
  const res = await fetch(url, {
    method: 'PUT',
    headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
    body: JSON.stringify(body)
  });
  const text = await res.text();
  let data;
  try { data = text ? JSON.parse(text) : null; } catch (e) { /* ignore */ }
  if (!res.ok) {
    const msg = (data && (data.message || JSON.stringify(data))) || text || ('HTTP ' + res.status);
    throw new Error(msg);
  }
  return data;
}

export const API = {
  stats: () => getJSON('/api/stats'),
  faculty: () => getJSON('/api/faculty'),
  students: () => getJSON('/api/students'),
  createFaculty: (body) => postJSON('/api/faculty', body),
  createStudent: (body) => postJSON('/api/students', body),
  updateFaculty: (id, body) => putJSON(`/api/faculty/${id}`, body),
  updateStudent: (id, body) => putJSON(`/api/students/${id}`, body),
  deleteFaculty: (id) => fetch(`/api/faculty/${id}`, { method: 'DELETE', headers: { 'Accept': 'application/json' } }).then(r => { if(!r.ok && r.status !== 204) throw new Error('Delete failed'); }),
  deleteStudent: (id) => fetch(`/api/students/${id}`, { method: 'DELETE', headers: { 'Accept': 'application/json' } }).then(r => { if(!r.ok && r.status !== 204) throw new Error('Delete failed'); }),
  restoreFaculty: (id) => postJSON(`/api/faculty/${id}/restore`, {}),
  restoreStudent: (id) => postJSON(`/api/students/${id}/restore`, {})
};


