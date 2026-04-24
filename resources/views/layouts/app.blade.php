<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Inventaris Mini')) — Inventaris Mini</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=DM+Serif+Display&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* ── CSS Variables ── */
        :root {
            --clr-bg:        #f0f2f7;
            --clr-surface:   #ffffff;
            --clr-border:    #e2e8f0;

            --clr-primary:   #4f46e5;   /* indigo-600 */
            --clr-primary-h: #4338ca;   /* indigo-700 */
            --clr-primary-s: #eef2ff;   /* indigo-50  */

            --clr-success:   #059669;
            --clr-danger:    #dc2626;
            --clr-warning:   #d97706;
            --clr-muted:     #64748b;
            --clr-text:      #1e293b;

            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 18px;

            --shadow-sm: 0 1px 3px rgba(0,0,0,.07), 0 1px 2px rgba(0,0,0,.05);
            --shadow-md: 0 4px 16px rgba(0,0,0,.08), 0 2px 6px rgba(0,0,0,.05);
            --shadow-lg: 0 10px 30px rgba(0,0,0,.1),  0 4px 12px rgba(0,0,0,.06);
        }

        /* ── Base ── */
        *, *::before, *::after { box-sizing: border-box; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--clr-bg);
            color: var(--clr-text);
            font-size: 15px;
            line-height: 1.6;
            min-height: 100vh;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'DM Serif Display', serif;
            font-weight: 400;
            color: var(--clr-text);
            letter-spacing: -0.02em;
        }

        /* ── Navbar ── */
        .app-nav {
            background: var(--clr-surface);
            border-bottom: 1px solid var(--clr-border);
            box-shadow: var(--shadow-sm);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .app-nav .navbar-brand {
            font-family: 'DM Serif Display', serif;
            font-size: 1.35rem;
            color: var(--clr-primary) !important;
            letter-spacing: -0.03em;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .app-nav .nav-link {
            color: var(--clr-muted) !important;
            font-weight: 500;
            font-size: 0.875rem;
            padding: 6px 12px !important;
            border-radius: var(--radius-sm);
            transition: color .2s, background .2s;
        }

        .app-nav .nav-link:hover,
        .app-nav .nav-link.active {
            color: var(--clr-primary) !important;
            background: var(--clr-primary-s);
        }

        .app-nav .nav-user {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--clr-text);
        }

        .app-nav .avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--clr-primary), #818cf8);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.8rem;
            font-weight: 700;
            font-family: 'DM Sans', sans-serif;
        }

        .app-nav .dropdown-menu {
            border: 1px solid var(--clr-border);
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-md);
            padding: 6px;
            min-width: 180px;
        }

        .app-nav .dropdown-item {
            border-radius: var(--radius-sm);
            font-size: 0.875rem;
            padding: 8px 12px;
            color: var(--clr-text);
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background .15s;
        }

        .app-nav .dropdown-item:hover { background: var(--clr-primary-s); color: var(--clr-primary); }
        .app-nav .dropdown-divider { border-color: var(--clr-border); margin: 4px 0; }
        .app-nav .dropdown-item.text-danger:hover { background: #fef2f2; color: var(--clr-danger); }

        /* ── Page Wrapper ── */
        .page-wrapper {
            max-width: 1100px;
            margin: 0 auto;
            padding: 36px 20px 60px;
        }

        /* ── Page Header ── */
        .page-header {
            margin-bottom: 28px;
        }

        .page-header h2 {
            font-size: 1.9rem;
            margin: 0;
        }

        .page-header p {
            color: var(--clr-muted);
            margin: 4px 0 0;
            font-size: 0.9rem;
        }

        /* ── Cards ── */
        .card-panel {
            background: var(--clr-surface);
            border: 1px solid var(--clr-border);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            overflow: hidden;
        }

        .card-panel-body { padding: 28px 32px; }

        /* ── Buttons ── */
        .btn { border-radius: var(--radius-sm) !important; font-weight: 500; font-size: 0.875rem; padding: 8px 18px; transition: all .2s; border: none; }

        .btn-primary {
            background: var(--clr-primary);
            color: white;
            box-shadow: 0 2px 8px rgba(79,70,229,.3);
        }
        .btn-primary:hover { background: var(--clr-primary-h); color: white; box-shadow: 0 4px 12px rgba(79,70,229,.4); transform: translateY(-1px); }

        .btn-success {
            background: var(--clr-success);
            color: white;
            box-shadow: 0 2px 8px rgba(5,150,105,.25);
        }
        .btn-success:hover { background: #047857; color: white; transform: translateY(-1px); }

        .btn-warning {
            background: var(--clr-warning);
            color: white;
            box-shadow: 0 2px 8px rgba(217,119,6,.25);
        }
        .btn-warning:hover { background: #b45309; color: white; transform: translateY(-1px); }

        .btn-danger {
            background: var(--clr-danger);
            color: white;
        }
        .btn-danger:hover { background: #b91c1c; color: white; transform: translateY(-1px); }

        .btn-outline-secondary {
            background: transparent;
            border: 1.5px solid var(--clr-border) !important;
            color: var(--clr-muted);
        }
        .btn-outline-secondary:hover { background: var(--clr-bg); color: var(--clr-text); }

        .btn-secondary { background: #e2e8f0; color: var(--clr-text); }
        .btn-secondary:hover { background: #cbd5e1; color: var(--clr-text); }

        /* ── Forms ── */
        .form-label { font-weight: 500; font-size: 0.875rem; color: var(--clr-text); margin-bottom: 6px; }

        .form-control, .form-select {
            border: 1.5px solid var(--clr-border);
            border-radius: var(--radius-sm) !important;
            font-size: 0.9rem;
            padding: 10px 14px;
            color: var(--clr-text);
            background: var(--clr-surface);
            transition: border-color .2s, box-shadow .2s;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--clr-primary);
            box-shadow: 0 0 0 3px rgba(79,70,229,.12);
            outline: none;
        }

        .form-control.is-invalid { border-color: var(--clr-danger); }
        .form-control.is-invalid:focus { box-shadow: 0 0 0 3px rgba(220,38,38,.12); }
        .invalid-feedback { font-size: 0.8rem; }

        /* ── Tables ── */
        .table-panel { overflow: hidden; }

        .table {
            margin: 0;
            font-size: 0.9rem;
        }

        .table thead th {
            background: #f8fafc;
            color: var(--clr-muted);
            font-family: 'DM Sans', sans-serif;
            font-size: 0.78rem;
            font-weight: 600;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            border-bottom: 1px solid var(--clr-border);
            border-top: none;
            padding: 14px 18px;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 14px 18px;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
            color: var(--clr-text);
        }

        .table tbody tr { transition: background .15s; }
        .table tbody tr:hover { background: #fafbff; }
        .table tbody tr:last-child td { border-bottom: none; }

        /* ── Badges ── */
        .badge-category {
            display: inline-block;
            background: var(--clr-primary-s);
            color: var(--clr-primary);
            font-size: 0.75rem;
            font-weight: 600;
            padding: 3px 10px;
            border-radius: 20px;
        }

        /* ── Stock badges ── */
        .stock-badge {
            display: inline-block;
            font-size: 0.82rem;
            font-weight: 600;
            padding: 3px 10px;
            border-radius: 20px;
        }
        .stock-badge.high { background: #ecfdf5; color: var(--clr-success); }
        .stock-badge.low  { background: #fffbeb; color: var(--clr-warning); }
        .stock-badge.zero { background: #fef2f2; color: var(--clr-danger); }

        /* ── Alert / Flash ── */
        .alert {
            border: none;
            border-radius: var(--radius-md);
            font-size: 0.875rem;
            font-weight: 500;
            padding: 12px 18px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .alert-success { background: #ecfdf5; color: #065f46; }
        .alert-danger  { background: #fef2f2; color: #991b1b; }

        /* ── Pagination ── */
        .pagination { gap: 4px; margin-top: 20px; }
        .page-link {
            border: 1.5px solid var(--clr-border) !important;
            border-radius: var(--radius-sm) !important;
            color: var(--clr-muted);
            font-size: 0.85rem;
            padding: 6px 12px;
            transition: all .15s;
        }
        .page-link:hover { background: var(--clr-primary-s); color: var(--clr-primary); border-color: var(--clr-primary) !important; }
        .page-item.active .page-link { background: var(--clr-primary) !important; border-color: var(--clr-primary) !important; color: white; }

        /* ── Footer ── */
        .app-footer {
            text-align: center;
            padding: 24px;
            font-size: 0.8rem;
            color: var(--clr-muted);
            border-top: 1px solid var(--clr-border);
            margin-top: auto;
        }

        /* ── Utilities ── */
        .divider { height: 1px; background: var(--clr-border); margin: 20px 0; }
        .text-muted { color: var(--clr-muted) !important; }
    </style>
</head>
<body>

    <!-- ── Navbar ── -->
    <nav class="app-nav navbar navbar-expand-md">
        <div class="container-fluid px-4">

            <a class="navbar-brand" href="{{ route('items.index') }}">
                <span style="font-size:1.4rem;">📦</span> Inventaris Mini
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <i class="bi bi-list" style="font-size:1.4rem; color:var(--clr-muted);"></i>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav me-auto ms-3">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('items.*') ? 'active' : '' }}" href="{{ route('items.index') }}">
                            <i class="bi bi-box-seam me-1"></i> Barang
                        </a>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-2">
                    @auth
                    <div class="dropdown">
                        <button class="btn btn-sm d-flex align-items-center gap-2 border-0 bg-transparent nav-user" data-bs-toggle="dropdown">
                            <div class="avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                            <i class="bi bi-chevron-down" style="font-size:.7rem; color:var(--clr-muted);"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="bi bi-person"></i> Profil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger w-100 text-start">
                                        <i class="bi bi-box-arrow-right"></i> Keluar
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm px-3">
                        <i class="bi bi-lock me-1"></i> Masuk
                    </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- ── Page Content ── -->
    <main>
        <div class="page-wrapper">
            @if(session('success'))
                <div class="alert alert-success mb-4" role="alert">
                    <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger mb-4" role="alert">
                    <i class="bi bi-exclamation-circle-fill"></i> {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <footer class="app-footer">
        © {{ date('Y') }} Inventaris Mini &mdash; Proyek Ujian Praktik Web Development
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
