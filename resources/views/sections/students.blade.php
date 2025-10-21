@extends('layouts.admin')
@section('title','STUDENTS')
@section('content')
    <style>
        .table thead th { font-weight: 600; }
    </style>
    <div class="p-4">
        <div id="studentsFlash" class="d-none"></div>
        <div class="d-flex align-items-center mb-3 gap-3">
            <div class="icon-badge">👥</div>
            <div>
                <h4 class="mb-1">Student Management</h4>
                <div class="text-muted">Add, edit, archive, filter & search students</div>
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
                <div class="col-md-3">
                    <label class="form-label">Course</label>
                    <select id="courseFilter" class="form-select">
                        <option value="">All</option>
                        <option>CS</option>
                        <option>IT</option>
                        <option>IS</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Search</label>
                    <input id="searchInput" type="search" class="form-control" placeholder="Search student">
                </div>
                <div class="col-md-2 text-md-end">
                    <label class="form-label d-none d-md-block">&nbsp;</label>
                    <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#addStudentModal">Add Student</button>
                </div>
            </div>

            <div class="table-responsive">
                <table id="studentsTable" class="table align-middle">
                    <thead>
                        <tr>
                            <th style="width:120px;">Student #</th>
                            <th style="min-width:220px;">Name</th>
                            <th>Course</th>
                            <th>Dept</th>
                            <th>Year Level</th>
                            <th style="width:120px;">Status</th>
                            <th style="width:140px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Student Modal -->
    <div class="modal fade" id="addStudentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addStudentForm">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">First Name</label>
                                <input name="first" type="text" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <input name="last" type="text" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input name="email" type="email" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Student #</label>
                                <input name="student_no" type="text" class="form-control" required>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button id="createStudentBtn" type="button" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Student Modal -->
    <div class="modal fade" id="editStudentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editStudentForm">
                        <input type="hidden" name="id" />
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Name</label>
                                <input name="name" type="text" class="form-control" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Course</label>
                                <input name="course" type="text" class="form-control" placeholder="Type course">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Department</label>
                                <select name="dept" class="form-select">
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
                            <div class="col-6">
                                <label class="form-label">Year Level</label>
                                <select name="year_level" class="form-select">
                                    <option value="">Select year</option>
                                    <option value="1st Year">1st Year</option>
                                    <option value="2nd Year">2nd Year</option>
                                    <option value="3rd Year">3rd Year</option>
                                    <option value="4th Year">4th Year</option>
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
                    <button id="saveStudentBtn" type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('load', function () {
            if (window.AdminPages && window.AdminPages.initStudentsPage) {
                window.AdminPages.initStudentsPage();
            }
        });
    </script>
    <script>
        (function(){
            const input = document.getElementById('searchInput');
            const dept = document.getElementById('deptFilter');
            const course = document.getElementById('courseFilter');
            const tbody = document.querySelector('#studentsTable tbody');
            function applyFilter(){
                const q = (input.value || '').toLowerCase();
                const d = dept.value;
                const c = course.value;
                tbody.querySelectorAll('tr').forEach(tr => {
                    const name = tr.dataset.name;
                    const td = tr.dataset.dept;
                    const tc = tr.dataset.course;
                    const visible = (!q || name.includes(q)) && (!d || td === d) && (!c || tc === c);
                    tr.style.display = visible ? '' : 'none';
                });
            }
            input.addEventListener('input', applyFilter);
            dept.addEventListener('change', applyFilter);
            course.addEventListener('change', applyFilter);
        })();
    </script>
@endsection


