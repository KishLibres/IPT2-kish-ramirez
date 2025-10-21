<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div class="d-flex" style="min-height:100vh;">
        <!-- Sidebar -->
        <aside class="text-white" style="width:260px;background:linear-gradient(180deg,#1d4ed8,#0ea5e9);">
            <div class="p-4 d-flex align-items-center gap-2 border-bottom border-white border-opacity-25">
                <div style="width:44px;height:44px;border-radius:8px;background:rgba(255,255,255,.15);"></div>
                <div>
                    <div class="fw-bold">Admin Portal</div>
                    <small class="text-white-50">FSUU</small>
                </div>
            </div>
            <nav class="p-3">
                <a class="d-flex align-items-center gap-2 text-white text-decoration-none p-2 rounded mb-2" style="background:rgba(255,255,255,.12);" href="/dashboard">Dashboard</a>
                <a class="d-block text-white-50 text-decoration-none p-2 rounded mb-2" href="/dashboard/faculty">Faculty</a>
                <a class="d-block text-white-50 text-decoration-none p-2 rounded mb-2" href="/dashboard/students">Students</a>
                <a class="d-block text-white-50 text-decoration-none p-2 rounded mb-2" href="/dashboard/reports">Reports</a>
                <a class="d-block text-white-50 text-decoration-none p-2 rounded mb-2" href="/dashboard/settings">System Settings</a>
            </nav>
            <div class="mt-auto p-3">
                <a class="btn btn-outline-light w-100" href="{{ route('logout') }}">Logout</a>
            </div>
        </aside>

        <!-- Main content -->
        <main class="flex-grow-1">
            <!-- Top bar -->
            <div class="d-flex align-items-center justify-content-between border-bottom" style="padding:14px 20px;background:#fff;">
                <div class="d-flex align-items-center gap-3">
                    <button id="sidebarToggle" class="btn btn-outline-secondary btn-sm" type="button">☰</button>
                    <span class="fw-semibold">DASHBOARD</span>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <span class="text-muted small">ADMINISTRATOR</span>
                </div>
            </div>

            <!-- Content -->
            <div class="p-4">
                <h5 class="mb-3">Welcome to Admin Portal</h5>
                <div class="row g-3">
                    <div class="col-md-3">
                        <div class="border rounded-3 p-3" style="background:#f8fafc;">
                            <div id="stat-students" class="text-primary fw-bold" style="font-size:28px;">0</div>
                            <div class="small text-muted">Total Students</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="border rounded-3 p-3" style="background:#ecfdf5;">
                            <div id="stat-faculty" class="text-success fw-bold" style="font-size:28px;">0</div>
                            <div class="small text-muted">Total Faculty</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="border rounded-3 p-3" style="background:#fffbeb;">
                            <div id="stat-courses" class="text-warning fw-bold" style="font-size:28px;">0</div>
                            <div class="small text-muted">Total Courses</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="border rounded-3 p-3" style="background:#faf5ff;">
                            <div id="stat-departments" class="text-purple fw-bold" style="font-size:28px;">0</div>
                            <div class="small text-muted">Departments</div>
                        </div>
                    </div>
                </div>

                <div class="row g-3 mt-1">
                    <div class="col-md-6">
                        <div class="border rounded-3 p-3" style="background:#fff7ed;">
                            <div id="stat-pending" class="text-warning fw-bold">0</div>
                            <div class="small text-muted">Pending Enrollments</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="border rounded-3 p-3" style="background:#ecfdf5;">
                            <div id="stat-status" class="text-success fw-bold">OK</div>
                            <div class="small text-muted">System Status</div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    <script>
        function tryInitDashboard(){
            if (window.AdminPages && typeof window.AdminPages.initDashboard === 'function') {
                window.AdminPages.initDashboard();
                return true;
            }
            return false;
        }
        document.addEventListener('DOMContentLoaded', function () {
            // ensure init runs after app.js registers AdminPages
            if (!tryInitDashboard()) {
                setTimeout(tryInitDashboard, 100);
            }
            var links = document.querySelectorAll('aside nav a');
            links.forEach(function (a) {
                a.addEventListener('click', function (e) {
                    e.preventDefault();
                    var href = a.getAttribute('href');
                    if (href) window.location.assign(href);
                });
            });
            var toggle = document.getElementById('sidebarToggle');
            if (toggle) {
                toggle.addEventListener('click', function(){
                    document.body.classList.toggle('sidebar-collapsed');
                });
            }
        });
    </script>
    </body>
    </html>


