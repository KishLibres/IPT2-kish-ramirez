<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style>
        :root { --overlay-bg: rgba(0, 24, 72, 0.0); }
        body, html { height: 100%; }
        .login-hero {
            position: relative;
            min-height: 100vh;
            background-image: url('{{ asset('images/515436993_1144062507751834_1121995578908054166_n.png') }}');
            background-size: contain; /* show the whole image */
            background-repeat: no-repeat;
            background-position: center center;
            background-color: #0b5dbb; /* match image tones for uncovered areas */
            display: flex; align-items: center; justify-content: center;
            font-family: 'Inter', system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial, 'Noto Sans', 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
        }
        .login-hero::before {
            content: "";
            position: absolute; inset: 0; background: var(--overlay-bg);
        }
        /* Left banner removed per request */

        .login-card {
            position: relative;
            width: 100%; max-width: 420px;
            background: rgba(255,255,255,0.35);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 16px;
            border: 1px solid rgba(255,255,255,0.35);
            box-shadow: 0 10px 30px rgba(0,0,0,0.25);
            color: #0f172a; /* slate-900 */
        }
        .login-card .title { font-weight: 800; letter-spacing: .2px; color: #0f172a; }
        .login-card .title-rule { height: 2px; background: rgba(15,23,42,.35); border: 0; margin: .5rem 0 1.25rem 0; }
        .login-card .form-label { color: #0f172a; font-weight: 700; }
        .login-card p { color: #0f172a; opacity: .9; }
        .brand-corner {
            position: absolute; top: 0; right: 0; width: 0; height: 0;
            border-top: 80px solid #22c55e; /* green corner accent similar to screenshot */
            border-left: 80px solid transparent; border-bottom: 0; border-right: 0;
            border-top-right-radius: 12px;
        }
        .footer-link { color: #0d6efd; text-decoration: none; }
        .footer-link:hover { text-decoration: underline; }

        /* Translucent inputs inside the glass card */
        .login-card .form-control {
            background: rgba(255,255,255,0.92);
            border: 1px solid rgba(148,163,184,0.5); /* slate-400 */
            color: #111827;
            border-radius: 9999px;
            padding: .9rem 1.25rem;
            box-shadow: inset 0 1px 2px rgba(0,0,0,0.06);
        }
        .login-card .form-control::placeholder { color: #6b7280; }
        .login-card .form-control:focus { border-color: #fff; box-shadow: 0 0 0 .2rem rgba(255,255,255,0.25); }

        /* Primary submit button styled like screenshot */
        .btn-admin {
            background-image: linear-gradient(180deg, #fbbf24, #f59e0b);
            color: #14243c; /* darker text for contrast */
            border: none;
            border-radius: 9999px;
            font-weight: 700;
            font-size: 1.35rem;
            padding: .9rem 1.25rem;
        }
        .btn-admin:hover { filter: brightness(1.03); }

        /* Layout: card to the right */
        .page-grid { position: relative; width: 100%; }
        @media (min-width: 992px) {
            .page-grid { display: grid; grid-template-columns: 1fr minmax(360px, 440px); gap: 24px; align-items: center; }
            .card-wrap { grid-column: 2; }
        }

        /* Branding items (crest removed) */
    </style>
    <script>
        // prevent FOUC of background on slow loads
        document.documentElement.style.visibility = 'hidden';
        window.addEventListener('load', function(){ document.documentElement.style.visibility = 'visible'; });
    </script>
    <!-- Open Graph for nicer previews -->
    <meta property="og:title" content="Login" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="{{ url('/images/515436993_1144062507751834_1121995578908054166_n.png') }}" />
    <meta property="og:url" content="{{ url('/login') }}" />
</head>
<body>
    <section class="login-hero">
        
        
        <div class="container px-3 page-grid">
            <div class="card-wrap mx-auto mx-lg-0 login-card p-4 p-md-5">
                <div class="brand-corner" aria-hidden="true"></div>
                <h2 class="title h4 mb-0">Login</h2>
                <hr class="title-rule" />
                <p class="mb-4">Welcome onboard with us!</p>

                <form method="post" action="{{ route('login.attempt') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">User</label>
                        <input class="form-control" type="text" name="login" placeholder="Enter your username or email" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="d-flex justify-content-end mb-3">
                        <a href="#" class="small footer-link">Forgot Password?</a>
                    </div>
                    <button class="btn btn-admin w-100" type="submit">Login</button>
                </form>

            </div>
        </div>
        
    </section>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>


