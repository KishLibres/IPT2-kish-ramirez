<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyApp · Modern Laravel Starter</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style>
        /* Page accents */
        .hero {
            padding: 6rem 0 4rem 0;
            background: radial-gradient(1200px 600px at 10% 10%, rgba(79,70,229,.12), transparent 60%),
                        radial-gradient(1000px 500px at 90% 0%, rgba(14,165,233,.10), transparent 60%);
        }
        .feature-icon {
            width: 64px;
            height: 64px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: rgba(13,110,253,0.08);
            color: var(--bs-primary);
            font-size: 28px;
        }
        footer.site-footer {
            padding: 2rem 0;
            background: var(--bs-body-bg);
            border-top: 1px solid var(--bs-border-color);
        }
        /* Improve discoverability for action buttons inside the table */
        #profilesTable .btn-edit, #profilesTable .btn-delete { cursor: pointer; }
        /* Profiles UI refinements */
        .table-sticky thead th { position: sticky; top: 0; background: var(--bs-body-bg); z-index: 2; }
        .table-compact td, .table-compact th { padding-top: .5rem; padding-bottom: .5rem; }
        .table-nowrap td, .table-nowrap th { white-space: nowrap; }
        #profilesSearch { max-width: 360px; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">MyApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMain">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item">
                        <button class="btn btn-outline-primary ms-2" type="button" data-bs-toggle="modal" data-bs-target="#profilesModal">
                            Profiles
                        </button>
                    </li>
                    <li class="nav-item"><a class="nav-link btn btn-primary text-white ms-2" href="#">Get Started</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <span class="badge rounded-pill text-bg-primary mb-3">New</span>
                    <h1 class="display-5 fw-bold mb-3">Build beautiful apps faster with a modern Laravel starter</h1>
                    <p class="lead text-muted">Pre-configured Bootstrap 5, clean components, and a slick theme. Connect your API and ship.</p>
                    <div class="d-flex flex-wrap gap-2 mt-3">
                        <a class="btn btn-primary btn-lg" href="#features" role="button">Explore Features</a>
                        <a class="btn btn-outline-secondary btn-lg" href="#about" role="button">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="shadow bg-white rounded-4 p-2 p-md-3">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=1200&auto=format&fit=crop" alt="Hero preview" style="width:100%;height:320px;object-fit:cover;border-radius:14px;" />
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="features" class="py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col text-center">
                    <h2 class="fw-bold">Features</h2>
                    <p class="text-muted">Everything you need to get your project off the ground.</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="h-100 p-4 border rounded-4 bg-white shadow-sm">
                        <div class="feature-icon mb-3">⚡</div>
                        <h5 class="mb-2">Fast setup</h5>
                        <p class="text-muted mb-0">Bootstrap 5, Laravel Mix and sensible defaults out of the box.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="h-100 p-4 border rounded-4 bg-white shadow-sm">
                        <div class="feature-icon mb-3">🔒</div>
                        <h5 class="mb-2">Secure</h5>
                        <p class="text-muted mb-0">Hardened defaults and patterns to keep your app safe.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="h-100 p-4 border rounded-4 bg-white shadow-sm">
                        <div class="feature-icon mb-3">🎨</div>
                        <h5 class="mb-2">Themed</h5>
                        <p class="text-muted mb-0">A fresh palette and typography based on Inter & Indigo.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-6">
                    <h3 class="fw-bold">About this starter</h3>
                    <p class="text-muted">A lightweight landing experience with a profiles CRUD modal wired to your API. Tweak the theme in one file and ship quickly.</p>
                    <ul class="text-muted mb-0">
                        <li>Bootstrap 5 theme variables for easy branding</li>
                        <li>Responsive layout and components</li>
                        <li>Modal-based profiles management</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="p-4 bg-white rounded-4 shadow-sm text-center">
                        <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?q=80&w=1200&auto=format&fit=crop" alt="Preview" style="width:100%;height:260px;object-fit:cover;border-radius:12px;" />
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- Profiles UI moved into a modal; opened via the 'Profiles' button in the navbar -->

        <!-- Profiles Modal -->
        <div class="modal fade" id="profilesModal" tabindex="-1" aria-labelledby="profilesModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="profilesModalLabel">Manage Profiles</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title">Profile Details</h5>
                                              <form id="profileForm" novalidate>
                                                <div class="row g-3">
                                                    <div class="col-sm-6">
                                                        <label class="form-label">First name</label>
                                                        <input type="text" name="fname" class="form-control" required minlength="2" placeholder="Juan" />
                                                        <div class="invalid-feedback">Please enter at least 2 characters.</div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label">Last name</label>
                                                        <input type="text" name="lname" class="form-control" required minlength="2" placeholder="Dela Cruz" />
                                                        <div class="invalid-feedback">Please enter at least 2 characters.</div>
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" name="email" class="form-control" required placeholder="name@example.com" />
                                                        <div class="invalid-feedback">Please provide a valid email.</div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label">Phone</label>
                                                        <input type="text" name="phone" class="form-control" placeholder="09xx xxx xxxx" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label">Age</label>
                                                        <input type="number" name="age" class="form-control" min="0" />
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label">Address</label>
                                                        <input type="text" name="address" class="form-control" placeholder="Street, City, Province" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-label">Gender</label>
                                                        <select name="gender" class="form-select">
                                                            <option value="">Select</option>
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                            <option value="other">Other</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-12 d-flex align-items-center gap-2">
                                                        <button class="btn btn-primary" type="submit" id="submitBtn">Create</button>
                                                        <button type="button" class="btn btn-outline-secondary d-none" id="cancelEditBtn">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                                                <h5 class="card-title mb-0">Existing Profiles</h5>
                                                <div class="d-flex gap-2">
                                                    <input id="profilesSearch" type="search" class="form-control" placeholder="Search name, email, phone">
                                                    <button class="btn btn-outline-secondary" id="profilesRefreshBtn" type="button">Refresh</button>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-hover table-striped align-middle table-compact table-nowrap table-sticky" id="profilesTable">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- Rows injected by JS -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    <footer class="site-footer">
        <div class="container text-center">
            <small class="text-muted">&copy; {{ date('Y') }} MyApp. Built with Laravel and Bootstrap.</small>
        </div>
    </footer>

    <script>
        // Simple client-side code to load and create profiles via the API
        let cachedProfiles = [];

        async function fetchProfiles() {
            try {
                console.debug('fetchProfiles: start');
                const res = await fetch('/api/profiles', { headers: { 'Accept': 'application/json' } });
                cachedProfiles = await res.json();
                renderProfiles(cachedProfiles);
                console.debug('fetchProfiles: loaded', cachedProfiles.length, 'rows');
            } catch (err) {
                console.error('fetchProfiles error', err);
            }
        }

        function renderProfiles(data) {
            const tbody = document.querySelector('#profilesTable tbody');
            tbody.innerHTML = '';
            data.forEach((p, i) => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${i + 1}</td>
                    <td>${p.fname} ${p.lname}</td>
                    <td>${p.email}</td>
                    <td>${p.phone || ''}</td>
                    <td class="text-nowrap">
                        <button type="button" class="btn btn-sm btn-outline-warning me-2 btn-edit" data-id="${p.id}">Edit</button>
                        <button type="button" class="btn btn-sm btn-outline-danger btn-delete" data-id="${p.id}">Delete</button>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }

        async function createProfile(formData) {
            try {
                const res = await fetch('/api/register', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                    body: JSON.stringify(Object.fromEntries(formData)),
                });
                if (!res.ok) {
                    let errText = await res.text();
                    try { errText = JSON.stringify(JSON.parse(errText)); } catch(e){}
                    alert('Error creating profile: ' + res.status + ' - ' + errText);
                    return;
                }
                await fetchProfiles();
            } catch (err) {
                console.error(err);
            }
        }

        async function deleteProfile(id) {
            if (!confirm('Delete this profile?')) return;
            try {
                const res = await fetch('/api/profiles/' + id, { method: 'DELETE', headers: { 'Accept': 'application/json' } });
                if (!res.ok) throw new Error('Delete failed');
                await fetchProfiles();
            } catch (err) {
                console.error(err);
            }
        }

        // Start editing a profile by fetching its data and populating the form
        async function startEdit(id) {
            console.debug('startEdit called', id);
                const modalEl = document.getElementById('profilesModal');
                // Use a dataset counter to robustly prevent hides across async operations
                modalEl.dataset.preventHideCount = String((parseInt(modalEl.dataset.preventHideCount || '0', 10) || 0) + 1);
                let modal;
                try {
                    if (window.bootstrap && bootstrap.Modal) {
                        modal = bootstrap.Modal.getOrCreateInstance(modalEl);
                        // show the modal (safe to call even if already visible)
                        console.debug('Showing modal via bootstrap API');
                        modal.show();
                    } else {
                        const opener = document.querySelector('[data-bs-target="#profilesModal"]');
                        if (opener) opener.click();
                    }

                    // show loading state
                    const submitBtn = document.getElementById('submitBtn');
                    submitBtn.disabled = true;
                    submitBtn.textContent = 'Loading...';

                    const res = await fetch('/api/profiles/' + id, { headers: { 'Accept': 'application/json' } });
                    if (!res.ok) {
                        const body = await res.text();
                        throw new Error(`Failed to load profile (status ${res.status}): ${body}`);
                    }
                    const p = await res.json();
                    const form = document.getElementById('profileForm');
                    form.elements['fname'].value = p.fname || '';
                    form.elements['lname'].value = p.lname || '';
                    form.elements['email'].value = p.email || '';
                    form.elements['phone'].value = p.phone || '';
                    form.elements['address'].value = p.address || '';
                    form.elements['age'].value = p.age || '';
                    form.elements['gender'].value = p.gender || '';
                    // set editing state
                    editingId = id;
                    document.getElementById('submitBtn').textContent = 'Update';
                    document.getElementById('cancelEditBtn').classList.remove('d-none');

                    // restore submit button state
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Update';
                    console.debug('startEdit: populated form for id=', id);
                } catch (err) {
                    console.error(err);
                    alert('Could not load profile for editing: ' + (err.message || err));
                } finally {
                    // decrement prevention counter
                    modalEl.dataset.preventHideCount = String(Math.max(0, (parseInt(modalEl.dataset.preventHideCount || '0', 10) || 0) - 1));
                    console.debug('startEdit: finished, preventHideCount=', modalEl.dataset.preventHideCount);
                }
            }

        async function updateProfile(id, formData) {
            try {
                let res = await fetch('/api/profiles/' + id, {
                    method: 'PUT',
                    headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                    body: JSON.stringify(Object.fromEntries(formData)),
                });
                if (!res.ok) {
                    // If PUT fails (some servers block PUT), retry with POST + X-HTTP-Method-Override
                    if (res.status === 405 || res.status === 403 || res.status === 0) {
                        try {
                            res = await fetch('/api/profiles/' + id, {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-HTTP-Method-Override': 'PUT' },
                                body: JSON.stringify(Object.fromEntries(formData)),
                            });
                        } catch (e) {
                            console.warn('Fallback POST/override failed', e);
                        }
                    }
                }
                if (!res.ok) {
                    let errText = await res.text();
                    try { errText = JSON.stringify(JSON.parse(errText)); } catch(e){}
                    alert('Error updating profile: ' + res.status + ' - ' + errText);
                    return;
                }
                await fetchProfiles();
                exitEditMode();
            } catch (err) {
                console.error(err);
            }
        }

        function exitEditMode() {
            editingId = null;
            document.getElementById('submitBtn').textContent = 'Create';
            document.getElementById('cancelEditBtn').classList.add('d-none');
            document.getElementById('profileForm').reset();
        }

    let editingId = null;

        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('profileForm');
            const cancelBtn = document.getElementById('cancelEditBtn');
            const searchInput = document.getElementById('profilesSearch');
            const refreshBtn = document.getElementById('profilesRefreshBtn');
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                // client-side validation
                if (!form.checkValidity()) {
                    form.classList.add('was-validated');
                    return;
                }
                const fd = new FormData(form);
                if (editingId) {
                    updateProfile(editingId, fd);
                } else {
                    createProfile(fd);
                }
            });

            cancelBtn.addEventListener('click', function () {
                exitEditMode();
            });

            // When modal opens, fetch profiles
            const profilesModalEl = document.getElementById('profilesModal');
            profilesModalEl.addEventListener('show.bs.modal', function () {
                console.debug('profilesModal: show event');
                fetchProfiles();
            });
            profilesModalEl.addEventListener('hide.bs.modal', function (e) {
                const count = parseInt(profilesModalEl.dataset.preventHideCount || '0', 10) || 0;
                if (count > 0 || editingId) {
                    console.debug('Prevented modal hide while edit in progress (count=' + count + ', editingId=' + editingId + ')');
                    e.preventDefault();
                }
            });

            // Reset table and form when modal hides
            profilesModalEl.addEventListener('hidden.bs.modal', function () {
                console.debug('profilesModal: hidden event');
                document.querySelector('#profilesTable tbody').innerHTML = '';
                exitEditMode();
            });

            // Delegated handlers for edit/delete buttons inside the table
            const tbody = document.querySelector('#profilesTable tbody');
            tbody.addEventListener('click', function (ev) {
                const editBtn = ev.target.closest('.btn-edit');
                if (editBtn) {
                    ev.stopPropagation(); ev.preventDefault();
                    const id = editBtn.dataset.id;
                    console.debug('Edit clicked for id=', id);
                    // ensure modal won't auto-close while we load
                    profilesModalEl.dataset.preventHideCount = String((parseInt(profilesModalEl.dataset.preventHideCount || '0', 10) || 0) + 1);
                    startEdit(id);
                    return;
                }
                const delBtn = ev.target.closest('.btn-delete');
                if (delBtn) {
                    ev.stopPropagation(); ev.preventDefault();
                    const id = delBtn.dataset.id;
                    console.debug('Delete clicked for id=', id);
                    deleteProfile(id);
                    return;
                }
            });

            // Search / filter
            if (searchInput) {
                searchInput.addEventListener('input', function () {
                    const q = searchInput.value.toLowerCase();
                    const filtered = cachedProfiles.filter(p => {
                        const name = `${p.fname || ''} ${p.lname || ''}`.toLowerCase();
                        return name.includes(q) || (p.email || '').toLowerCase().includes(q) || (p.phone || '').toLowerCase().includes(q);
                    });
                    renderProfiles(filtered);
                });
            }

            if (refreshBtn) {
                refreshBtn.addEventListener('click', function () {
                    fetchProfiles();
                });
            }
        });
    </script>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>