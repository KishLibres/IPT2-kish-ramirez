<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div class="d-flex" style="min-height:100vh;">
        <!-- Sidebar -->
        <aside class="text-white sidebar-gradient" style="width:260px;">
            <div class="p-4 d-flex align-items-center gap-2 border-bottom border-white border-opacity-25">
                <div class="icon-badge" style="width:44px;height:44px;border-radius:8px;"></div>
                <div>
                    <div class="fw-bold">Admin Portal</div>
                    <small class="text-white-50">FSUU</small>
                </div>
            </div>
            <nav class="p-3">
                <a class="d-flex align-items-center gap-2 text-decoration-none p-2 rounded mb-2 {{ Request::is('dashboard') ? 'text-white' : 'text-white-50' }}" style="{{ Request::is('dashboard') ? 'background:rgba(255,255,255,.12);' : '' }}" href="/dashboard">Dashboard</a>
                <a class="d-flex align-items-center gap-2 text-decoration-none p-2 rounded mb-2 {{ Request::is('dashboard/faculty') ? 'text-white' : 'text-white-50' }}" style="{{ Request::is('dashboard/faculty') ? 'background:rgba(255,255,255,.12);' : '' }}" href="/dashboard/faculty">Faculty</a>
                <a class="d-flex align-items-center gap-2 text-decoration-none p-2 rounded mb-2 {{ Request::is('dashboard/students') ? 'text-white' : 'text-white-50' }}" style="{{ Request::is('dashboard/students') ? 'background:rgba(255,255,255,.12);' : '' }}" href="/dashboard/students">Students</a>
                <a class="d-flex align-items-center gap-2 text-decoration-none p-2 rounded mb-2 {{ Request::is('dashboard/reports') ? 'text-white' : 'text-white-50' }}" style="{{ Request::is('dashboard/reports') ? 'background:rgba(255,255,255,.12);' : '' }}" href="/dashboard/reports">Reports</a>
                <a class="d-flex align-items-center gap-2 text-decoration-none p-2 rounded mb-2 {{ Request::is('dashboard/settings') ? 'text-white' : 'text-white-50' }}" style="{{ Request::is('dashboard/settings') ? 'background:rgba(255,255,255,.12);' : '' }}" href="/dashboard/settings">System Settings</a>
            </nav>
            <div class="mt-auto p-3">
                <a class="btn btn-outline-light w-100" href="{{ route('logout') }}">Logout</a>
            </div>
        </aside>

        <!-- Main content -->
        <main class="flex-grow-1">
            <div class="d-flex align-items-center justify-content-between border-bottom topbar">
                <span class="fw-semibold">@yield('title', 'Dashboard')</span>
                <div class="d-flex align-items-center gap-3">
                    <span class="text-muted small">ADMINISTRATOR</span>
                </div>
            </div>
            @yield('content')
        </main>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var links = document.querySelectorAll('aside nav a');
            links.forEach(function (a) {
                a.addEventListener('click', function (e) {
                    e.preventDefault();
                    var href = a.getAttribute('href');
                    if (href) window.location.assign(href);
                });
            });
        });
    </script>
</body>
</html>


