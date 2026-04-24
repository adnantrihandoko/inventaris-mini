@extends('layouts.guest')
@section('title', 'Daftar — Inventaris Mini')

@section('auth-content')
<div class="auth-card-head">
    <div class="auth-logo-mark">📦</div>
    <h1>Buat Akun Baru</h1>
    <p>Daftar untuk mulai mengelola inventaris</p>
</div>

<div class="auth-card-body">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nama -->
        <div class="form-group">
            <label for="name" class="form-label">Nama Lengkap</label>
            <div class="input-wrap">
                <i class="bi bi-person input-icon"></i>
                <input type="text" id="name" name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}" required autofocus placeholder="Nama Anda">
            </div>
            @error('name')
                <p class="field-error"><i class="bi bi-exclamation-circle"></i> {{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email" class="form-label">Alamat Email</label>
            <div class="input-wrap">
                <i class="bi bi-envelope input-icon"></i>
                <input type="email" id="email" name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" required placeholder="nama@email.com">
            </div>
            @error('email')
                <p class="field-error"><i class="bi bi-exclamation-circle"></i> {{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password" class="form-label">Kata Sandi</label>
            <div class="input-wrap">
                <i class="bi bi-lock input-icon"></i>
                <input type="password" id="password" name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    required placeholder="Minimal 8 karakter">
            </div>
            @error('password')
                <p class="field-error"><i class="bi bi-exclamation-circle"></i> {{ $message }}</p>
            @enderror
        </div>

        <!-- Konfirmasi Password -->
        <div class="form-group">
            <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
            <div class="input-wrap">
                <i class="bi bi-lock-fill input-icon"></i>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="form-control" required placeholder="Ulangi kata sandi">
            </div>
        </div>

        <button type="submit" class="btn-submit">
            <i class="bi bi-person-plus"></i> Daftar Sekarang
        </button>
    </form>

    <div class="auth-links">
        Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
    </div>
</div>

<div style="text-align:center;">
    <a href="{{ url('/') }}" class="back-home"><i class="bi bi-arrow-left"></i> Kembali ke beranda</a>
</div>
@endsection
