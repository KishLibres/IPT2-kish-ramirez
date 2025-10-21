@extends('layouts.admin')
@section('title','SYSTEM SETTINGS')
@section('content')
    <div class="p-4">
        <div class="d-flex align-items-start gap-3 mb-3">
            <div class="icon-badge">⚙️</div>
            <div>
                <h5 class="mb-1">System Settings</h5>
                <div class="text-muted">Manage courses, departments & academic years</div>
            </div>
        </div>

        <div class="d-flex gap-2 mb-3">
            <button type="button" class="btn btn-primary" data-panel="#panel-courses">Courses</button>
            <button type="button" class="btn btn-outline-secondary" data-panel="#panel-departments">Departments</button>
            <button type="button" class="btn btn-outline-secondary" data-panel="#panel-academic">Academic Year</button>
        </div>

        <div id="panel-courses" class="border rounded-3 p-3 p-md-4 bg-white">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <div class="fw-semibold">Courses</div>
                <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#addCourseModal">Add Course</button>
            </div>
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>BSIT</td>
                            <td>Bachelor of Science in Information Technology</td>
                            <td>CSP</td>
                            <td><span class="status-badge status-active">Active</span></td>
                            <td>-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="panel-departments" class="border rounded-3 p-3 p-md-4 bg-white d-none">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <div class="fw-semibold">Departments</div>
                <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#addDeptModal">Add Department</button>
            </div>
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>CSP</td>
                            <td>Computer Studies Program</td>
                            <td><span class="status-badge status-active">Active</span></td>
                            <td>-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="panel-academic" class="border rounded-3 p-3 p-md-4 bg-white d-none">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <div class="fw-semibold">Academic Years</div>
                <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#addAyModal">Add Academic Year</button>
            </div>
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>Year</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2025-2026</td>
                            <td><span class="status-badge status-active">Active</span></td>
                            <td>-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modals -->
    <div class="modal fade" id="addCourseModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><h5 class="modal-title">Add Course</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                <div class="modal-body">
                    <form id="addCourseForm" class="vstack gap-3" onsubmit="return false;">
                        <input class="form-control" name="code" placeholder="Code (e.g., BSIT)" required>
                        <input class="form-control" name="name" placeholder="Name" required>
                        <select class="form-select" name="department">
                            <option value="">Department (optional)</option>
                            <option value="CSP">CSP</option>
                            <option value="BAP">BAP</option>
                            <option value="ASP">ASP</option>
                            <option value="THMP">THMP</option>
                            <option value="AP">AP</option>
                            <option value="ETP">ETP</option>
                            <option value="TEP">TEP</option>
                            <option value="CJEP">CJEP</option>
                        </select>
                    </form>
                </div>
                <div class="modal-footer"><button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button id="saveCourseBtn" class="btn btn-primary" type="button">Save</button></div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addDeptModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><h5 class="modal-title">Add Department</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                <div class="modal-body">
                    <form id="addDeptForm" class="vstack gap-3" onsubmit="return false;">
                        <input class="form-control" name="code" placeholder="Code (e.g., CSP)" required>
                        <input class="form-control" name="name" placeholder="Name" required>
                    </form>
                </div>
                <div class="modal-footer"><button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button id="saveDeptBtn" class="btn btn-primary" type="button">Save</button></div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addAyModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><h5 class="modal-title">Add Academic Year</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                <div class="modal-body">
                    <form id="addAyForm" class="vstack gap-3" onsubmit="return false;">
                        <input class="form-control" name="year" placeholder="Year (e.g., 2025-2026)" required>
                    </form>
                </div>
                <div class="modal-footer"><button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button id="saveAyBtn" class="btn btn-primary" type="button">Save</button></div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function(){
            (function wait(){
                if (window.AdminPages && typeof window.AdminPages.initSettings === 'function') {
                    window.AdminPages.initSettings();
                } else {
                    setTimeout(wait, 100);
                }
            })();
        });
    </script>
@endsection


