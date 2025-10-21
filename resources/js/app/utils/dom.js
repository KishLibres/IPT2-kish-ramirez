export function showModal(modalEl) {
  if (!modalEl) return;
  if (window.bootstrap && window.bootstrap.Modal) {
    window.bootstrap.Modal.getOrCreateInstance(modalEl).show();
  } else {
    modalEl.style.display = 'block';
    modalEl.removeAttribute('aria-hidden');
    modalEl.classList.add('show');
    const backdrop = document.createElement('div');
    backdrop.className = 'modal-backdrop fade show';
    document.body.appendChild(backdrop);
    document.body.classList.add('modal-open');
    modalEl.querySelectorAll('[data-bs-dismiss="modal"]').forEach(btn => {
      btn.addEventListener('click', () => hideModal(modalEl));
    });
  }
}

export function hideModal(modalEl) {
  if (!modalEl) return;
  try {
    if (window.bootstrap && window.bootstrap.Modal) {
      window.bootstrap.Modal.getOrCreateInstance(modalEl).hide();
      return;
    }
  } catch (_) {}
  modalEl.classList.remove('show');
  modalEl.setAttribute('aria-hidden','true');
  modalEl.style.display = 'none';
  document.body.classList.remove('modal-open');
  document.querySelectorAll('.modal-backdrop').forEach(b=>b.remove());
}

export function flashSuccess(elementId, message){
  const el = document.getElementById(elementId);
  if (!el) return;
  el.className = 'alert alert-success';
  el.textContent = message;
  setTimeout(() => { el.className = 'd-none'; el.textContent = ''; }, 2500);
}


