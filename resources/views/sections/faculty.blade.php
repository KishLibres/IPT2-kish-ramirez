@extends('layouts.admin')
@section('title','FACULTY')
@section('content')
    <style>
        .table thead th { font-weight: 600; }
    </style>
    <div class="p-4">
        <div id="facultyFlash" class="d-none"></div>
        <div class="d-flex align-items-center mb-3 gap-3">
            <div class="icon-badge">🎓</div>
            <div>
                <h4 class="mb-1">Faculty Management</h4>
                <div class="text-muted">Add, edit, archive, filter & search faculty members</div>
            </div>
        </div>

        <div class="bg-white border rounded-3 p-3 p-md-4">
            <div class="row g-3 align-items-end mb-3">
                <div class="col-md-3">
                    <label class="form-label">Department</label>
                    <select id="deptFilter" class="form-select">
                        <option value="">All</option>
                        <option>CSP</option>
                        <option>BAP</option>
                        <option>ASP</option>
                        <option>THMP</option>
                        <option>AP</option>
                        <option>ETP</option>
                        <option>TEP</option>
                        <option>CJEP</option>
                    </select>
                </div>
                <div class="col-md-7">
                    <label class="form-label">Search</label>
                    <input id="searchInput" type="search" class="form-control" placeholder="Search faculty">
                </div>
                <div class="col-md-2 text-md-end">
                    <label class="form-label d-none d-md-block">&nbsp;</label>
                    <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#addFacultyModal">Add Faculty</button>
                </div>
            </div>

            <div class="table-responsive">
                <table id="facultyTable" class="table align-middle">
                    <thead>
                        <tr>
                            <th style="width:110px;">ID</th>
                            <th style="min-width:220px;">Name</th>
                            <th>Department</th>
                            <th style="width:120px;">Status</th>
                            <th style="width:160px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Faculty Modal -->
    <div class="modal fade" id="addFacultyModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Faculty</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addFacultyForm">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Code</label>
                                <input name="code" type="text" class="form-control" placeholder="FAC-007" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Name</label>
                                <input name="name" type="text" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input name="email" type="email" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Employee #</label>
                                <input type="text" class="form-control" disabled placeholder="--">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Department</label>
                                <select name="department" class="form-select">
                                    <option value="">Select department</option>
                                    <option value="CSP">CSP</option>
                                    <option value="BAP">BAP</option>
                                    <option value="ASP">ASP</option>
                                    <option value="THMP">THMP</option>
                                    <option value="AP">AP</option>
                                    <option value="ETP">ETP</option>
                                    <option value="TEP">TEP</option>
                                    <option value="CJEP">CJEP</option>
                                </select>
                            </div>
                            
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button id="createFacultyBtn" type="button" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Faculty Modal -->
    <div class="modal fade" id="editFacultyModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Faculty</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editFacultyForm">
                        <input type="hidden" name="id" />
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Name</label>
                                <input name="name" type="text" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input name="email" type="email" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Department</label>
                                <select name="department" class="form-select">
                                    <option value="">Select department</option>
                                    <option value="CSP">CSP</option>
                                    <option value="BAP">BAP</option>
                                    <option value="ASP">ASP</option>
                                    <option value="THMP">THMP</option>
                                    <option value="AP">AP</option>
                                    <option value="ETP">ETP</option>
                                    <option value="TEP">TEP</option>
                                    <option value="CJEP">CJEP</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button id="saveFacultyBtn" type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('load', function () {
            if (window.AdminPages && window.AdminPages.initFacultyPage) {
                window.AdminPages.initFacultyPage();
            }
        });
    </script>
    <script>
        (function(){
            const input = document.getElementById('searchInput');
            const dept = document.getElementById('deptFilter');
            const tbody = document.querySelector('#facultyTable tbody');
            function applyFilter(){
                const q = (input.value || '').toLowerCase();
                const d = dept.value;
                tbody.querySelectorAll('tr').forEach(tr => {
                    const name = tr.dataset.name;
                    const department = tr.dataset.dept;
                    const visible = (!q || name.includes(q)) && (!d || department === d);
                    tr.style.display = visible ? '' : 'none';
                });
            }
            input.addEventListener('input', applyFilter);
            dept.addEventListener('change', applyFilter);
        })();
    </script>
@endsection


