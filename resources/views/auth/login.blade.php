<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk — Inventaris Mini</title>

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
            --clr-primary-s: #eef2ff;
            --clr-danger:    #dc2626;
            --clr-border:    #e2e8f0;
            --clr-text:      #1e293b;
            --clr-muted:     #64748b;
            --radius-sm:     8px;
            --radius-md:     12px;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            background: #f0f2f7;
        }

        /* ── Left Panel (decorative, hidden on mobile) ── */
        .auth-left {
            flex: 1;
            background: linear-gradient(145deg, #312e81 0%, #4f46e5 45%, #6d28d9 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 48px;
            position: relative;
            overflow: hidden;
        }

        .auth-left::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 20% 20%, rgba(255,255,255,.06) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255,255,255,.04) 0%, transparent 40%);
        }

        /* Grid pattern overlay */
        .auth-left::after {
            content: '';
            position: absolute;
            inset: 0;
            background-image: linear-gradient(rgba(255,255,255,.04) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(255,255,255,.04) 1px, transparent 1px);
            background-size: 36px 36px;
        }

        .auth-left-inner {
            position: relative;
            z-index: 1;
            text-align: center;
            color: white;
            max-width: 360px;
        }

        .auth-brand {
            font-family: 'DM Serif Display', serif;
            font-size: 2.2rem;
            letter-spacing: -0.04em;
            margin-bottom: 12px;
        }

        .auth-tagline {
            font-size: 1rem;
            opacity: .75;
            line-height: 1.6;
            margin-bottom: 40px;
        }

        /* Feature list */
        .feature-list {
            list-style: none;
            text-align: left;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .feature-list li {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.875rem;
            opacity: .85;
        }

        .feature-list .feat-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: rgba(255,255,255,.15);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 1rem;
        }

        /* ── Right Panel (form) ── */
        .auth-right {
            width: 480px;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 48px 40px;
            background: #f0f2f7;
        }

        .auth-card {
            width: 100%;
            max-width: 400px;
        }

        .auth-card-head {
            text-align: center;
            margin-bottom: 32px;
        }

        .auth-logo-mark {
            width: 56px;
            height: 56px;
            background: linear-gradient(135deg, var(--clr-primary), #818cf8);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            margin: 0 auto 16px;
            box-shadow: 0 8px 24px rgba(79,70,229,.3);
        }

        .auth-card-head h1 {
            font-family: 'DM Serif Display', serif;
            font-size: 1.9rem;
            color: var(--clr-text);
            letter-spacing: -0.03em;
            margin-bottom: 6px;
        }

        .auth-card-head p {
            font-size: 0.875rem;
            color: var(--clr-muted);
        }

        /* Form card */
        .login-card {
            background: white;
            border: 1px solid var(--clr-border);
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,.07);
            padding: 32px;
        }

        .form-label {
            font-weight: 500;
            font-size: 0.875rem;
            color: var(--clr-text);
            margin-bottom: 6px;
            display: block;
        }

        .form-control {
            border: 1.5px solid var(--clr-border);
            border-radius: var(--radius-sm);
            font-size: 0.9rem;
            padding: 11px 14px;
            color: var(--clr-text);
            width: 100%;
            font-family: 'DM Sans', sans-serif;
            transition: border-color .2s, box-shadow .2s;
            background: white;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--clr-primary);
            box-shadow: 0 0 0 3px rgba(79,70,229,.12);
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap .input-icon {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: .9rem;
            pointer-events: none;
        }

        .input-wrap .form-control { padding-left: 38px; }

        .form-group { margin-bottom: 18px; }

        /* Error */
        .field-error {
            font-size: 0.78rem;
            color: var(--clr-danger);
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .form-control.is-invalid { border-color: var(--clr-danger); }
        .form-control.is-invalid:focus { box-shadow: 0 0 0 3px rgba(220,38,38,.12); }

        /* Alert */
        .status-alert {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: var(--radius-sm);
            padding: 10px 14px;
            font-size: 0.82rem;
            color: #166534;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Remember & forgot */
        .auth-extras {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 22px;
            font-size: 0.83rem;
        }

        .remember-label {
            display: flex;
            align-items: center;
            gap: 6px;
            color: var(--clr-muted);
            cursor: pointer;
        }

        .remember-label input[type=checkbox] {
            width: 15px;
            height: 15px;
            accent-color: var(--clr-primary);
            cursor: pointer;
        }

        .forgot-link {
            color: var(--clr-primary);
            text-decoration: none;
            font-weight: 500;
        }
        .forgot-link:hover { text-decoration: underline; }

        /* Submit button */
        .btn-login {
            width: 100%;
            background: var(--clr-primary);
            color: white;
            border: none;
            border-radius: var(--radius-sm);
            padding: 12px;
            font-size: 0.95rem;
            font-weight: 600;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer;
            box-shadow: 0 4px 14px rgba(79,70,229,.3);
            transition: all .2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-login:hover {
            background: var(--clr-primary-h);
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(79,70,229,.4);
        }

        /* Register link */
        .register-link {
            text-align: center;
            margin-top: 20px;
            font-size: 0.83rem;
            color: var(--clr-muted);
        }
        .register-link a { color: var(--clr-primary); font-weight: 500; text-decoration: none; }
        .register-link a:hover { text-decoration: underline; }

        /* Back home */
        .back-home {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.8rem;
            color: var(--clr-muted);
            text-decoration: none;
            margin-top: 28px;
        }
        .back-home:hover { color: var(--clr-primary); }

        /* ── Mobile ── */
        @media (max-width: 768px) {
            body { flex-direction: column; }
            .auth-left { display: none; }
            .auth-right { width: 100%; padding: 32px 20px; }
        }
    </style>
</head>
<body>

    <!-- Left decorative panel -->
    <div class="auth-left d-none d-md-flex">
        <div class="auth-left-inner">
            <p style="font-size:3rem; margin-bottom:16px;">📦</p>
            <h2 class="auth-brand">Inventaris Mini</h2>
            <p class="auth-tagline">Sistem pencatatan stok barang yang<br>bersih, cepat, dan mudah digunakan.</p>

            <ul class="feature-list">
                <li>
                    <div class="feat-icon">📋</div>
                    <span>Manajemen barang lengkap dengan CRUD</span>
                </li>
                <li>
                    <div class="feat-icon">🔍</div>
                    <span>Pencarian & filter barang real-time</span>
                </li>
                <li>
                    <div class="feat-icon">🏷️</div>
                    <span>Organisasi kategori yang fleksibel</span>
                </li>
                <li>
                    <div class="feat-icon">📱</div>
                    <span>Tampilan responsif di semua perangkat</span>
                </li>
            </ul>
        </div>
    </div>

    <!-- Right form panel -->
    <div class="auth-right">
        <div class="auth-card">

            <div class="auth-card-head">
                <div class="auth-logo-mark">📦</div>
                <h1>Selamat Datang</h1>
                <p>Masuk ke akun Inventaris Mini Anda</p>
            </div>

            <div class="login-card">

                <!-- Session status -->
                @if(session('status'))
                    <div class="status-alert">
                        <i class="bi bi-check-circle-fill"></i>
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email" class="form-label">Alamat Email</label>
                        <div class="input-wrap">
                            <i class="bi bi-envelope input-icon"></i>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}"
                                placeholder="nama@email.com"
                                required
                                autofocus
                                autocomplete="username"
                            >
                        </div>
                        @error('email')
                            <p class="field-error">
                                <i class="bi bi-exclamation-circle"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <div class="input-wrap">
                            <i class="bi bi-lock input-icon"></i>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="••••••••"
                                required
                                autocomplete="current-password"
                            >
                        </div>
                        @error('password')
                            <p class="field-error">
                                <i class="bi bi-exclamation-circle"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Remember me + Forgot -->
                    <div class="auth-extras">
                        <label class="remember-label">
                            <input type="checkbox" name="remember">
                            <span>Ingat saya</span>
                        </label>
                        @if(Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="forgot-link">
                                Lupa kata sandi?
                            </a>
                        @endif
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn-login">
                        <i class="bi bi-box-arrow-in-right"></i> Masuk
                    </button>
                </form>

                @if(Route::has('register'))
                    <p class="register-link">
                        Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
                    </p>
                @endif

            </div>

            <div style="text-align:center;">
                <a href="{{ url('/') }}" class="back-home">
                    <i class="bi bi-arrow-left"></i> Kembali ke beranda
                </a>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
