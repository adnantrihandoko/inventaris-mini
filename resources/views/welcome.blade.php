<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Mini — Kelola Stok Barang</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&family=DM+Serif+Display&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --clr-primary: #4f46e5;
            --clr-primary-h: #4338ca;
            --clr-text: #1e293b;
            --clr-muted: #64748b;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #f0f2f7;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ── Topbar ── */
        .topbar {
            padding: 18px 36px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-family: 'DM Serif Display', serif;
            font-size: 1.3rem;
            color: var(--clr-primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .topbar-actions a {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--clr-muted);
            text-decoration: none;
            padding: 8px 18px;
            border-radius: 8px;
            border: 1.5px solid #e2e8f0;
            background: white;
            transition: all .2s;
        }

        .topbar-actions a:hover {
            color: var(--clr-primary);
            border-color: var(--clr-primary);
            background: #eef2ff;
        }

        /* ── Hero ── */
        .hero {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px 80px;
        }

        .hero-inner {
            max-width: 680px;
            width: 100%;
            text-align: center;
        }

        /* Floating badge */
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #eef2ff;
            color: var(--clr-primary);
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            padding: 6px 16px;
            border-radius: 20px;
            border: 1px solid #c7d2fe;
            margin-bottom: 28px;
        }

        /* Icon cluster */
        .hero-icons {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: -8px;
            margin-bottom: 30px;
        }

        .icon-card {
            width: 64px;
            height: 64px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            box-shadow: 0 6px 20px rgba(0,0,0,.1);
            position: relative;
        }

        .icon-card:nth-child(1) { background: #fff; transform: rotate(-8deg) translateX(10px); }
        .icon-card:nth-child(2) { background: linear-gradient(135deg, #4f46e5, #818cf8); z-index: 1; width: 76px; height: 76px; border-radius: 20px; font-size: 2.1rem; }
        .icon-card:nth-child(3) { background: #fff; transform: rotate(8deg) translateX(-10px); }

        h1.hero-title {
            font-family: 'DM Serif Display', serif;
            font-size: clamp(2.4rem, 6vw, 3.4rem);
            color: var(--clr-text);
            line-height: 1.18;
            letter-spacing: -0.03em;
            margin-bottom: 18px;
        }

        h1.hero-title span {
            background: linear-gradient(90deg, #4f46e5, #818cf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-desc {
            font-size: 1.05rem;
            color: var(--clr-muted);
            line-height: 1.7;
            margin-bottom: 36px;
            max-width: 480px;
            margin-left: auto;
            margin-right: auto;
        }

        /* CTA buttons */
        .hero-cta {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-cta-primary {
            background: var(--clr-primary);
            color: white;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 13px 28px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 16px rgba(79,70,229,.35);
            transition: all .2s;
        }

        .btn-cta-primary:hover {
            background: var(--clr-primary-h);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(79,70,229,.4);
        }

        .btn-cta-secondary {
            background: white;
            color: var(--clr-text);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            padding: 13px 28px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: 1.5px solid #e2e8f0;
            transition: all .2s;
        }

        .btn-cta-secondary:hover {
            border-color: var(--clr-primary);
            color: var(--clr-primary);
            background: #eef2ff;
            transform: translateY(-2px);
        }

        /* Stats strip */
        .stats-strip {
            margin-top: 56px;
            display: flex;
            gap: 0;
            justify-content: center;
            background: white;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 16px rgba(0,0,0,.06);
            overflow: hidden;
        }

        .stat-item {
            flex: 1;
            padding: 20px 24px;
            text-align: center;
            border-right: 1px solid #f1f5f9;
        }

        .stat-item:last-child { border-right: none; }

        .stat-icon {
            font-size: 1.4rem;
            margin-bottom: 6px;
        }

        .stat-label {
            font-size: 0.78rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--clr-muted);
        }

        .stat-desc {
            font-size: 0.82rem;
            color: #94a3b8;
            margin-top: 2px;
        }

        /* ── Footer ── */
        footer {
            text-align: center;
            padding: 20px;
            font-size: 0.78rem;
            color: #94a3b8;
        }

        @media (max-width: 576px) {
            .topbar { padding: 14px 18px; }
            .stats-strip { flex-direction: column; }
            .stat-item { border-right: none; border-bottom: 1px solid #f1f5f9; }
        }
    </style>
</head>
<body>

    <!-- Topbar -->
    <header class="topbar">
        <a href="/" class="logo">
            <span>📦</span> Inventaris Mini
        </a>
        <div class="topbar-actions">
            @if (Route::has('login'))
                @auth
                    <a href="{{ route('items.index') }}"><i class="bi bi-grid me-1"></i> Dashboard</a>
                @else
                    <a href="{{ route('login') }}"><i class="bi bi-lock me-1"></i> Masuk</a>
                @endauth
            @endif
        </div>
    </header>

    <!-- Hero -->
    <section class="hero">
        <div class="hero-inner">

            <div class="hero-badge">
                <i class="bi bi-stars"></i> Sistem Manajemen Inventaris
            </div>

            <!-- Icon cluster -->
            <div class="hero-icons">
                <div class="icon-card">🗂️</div>
                <div class="icon-card">📦</div>
                <div class="icon-card">📊</div>
            </div>

            <h1 class="hero-title">
                Kelola Stok Barang<br>
                dengan <span>Mudah & Rapi</span>
            </h1>

            <p class="hero-desc">
                Tambah, edit, cari, dan pantau inventaris barang Anda kapan saja.
                Antarmuka bersih, data terstruktur, kendali penuh di tangan Anda.
            </p>

            <div class="hero-cta">
                <a href="{{ route('items.index') }}" class="btn-cta-primary">
                    <i class="bi bi-grid-3x3-gap"></i> Lihat Semua Barang
                </a>
                @if(Route::has('login') && !auth()->check())
                <a href="{{ route('login') }}" class="btn-cta-secondary">
                    <i class="bi bi-person-circle"></i> Login Dulu
                </a>
                @endif
            </div>

            <!-- Stats strip -->
            <div class="stats-strip">
                <div class="stat-item">
                    <div class="stat-icon">📋</div>
                    <div class="stat-label">CRUD Lengkap</div>
                    <div class="stat-desc">Tambah, edit & hapus</div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">🔍</div>
                    <div class="stat-label">Pencarian Cepat</div>
                    <div class="stat-desc">Filter nama barang</div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">🏷️</div>
                    <div class="stat-label">Kategori</div>
                    <div class="stat-desc">Organisasi terstruktur</div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">📱</div>
                    <div class="stat-label">Responsif</div>
                    <div class="stat-desc">Mobile friendly</div>
                </div>
            </div>

        </div>
    </section>

    <footer>
        © {{ date('Y') }} Inventaris Mini &mdash; Proyek Ujian Praktik Web Development
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
