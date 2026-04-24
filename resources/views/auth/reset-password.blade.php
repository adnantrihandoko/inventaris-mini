@extends('layouts.guest')
@section('title', 'Reset Kata Sandi — Inventaris Mini')

@section('auth-content')
<div class="auth-card-head">
    <div class="auth-logo-mark">📦</div>
    <h1>Reset Kata Sandi</h1>
    <p>Masukkan kata sandi baru Anda</p>
</div>

<div class="auth-card-body">
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email -->
        <div class="form-group">
            <label for="email" class="form-label">Alamat Email</label>
            <div class="input-wrap">
                <i class="bi bi-envelope input-icon"></i>
                <input type="email" id="email" name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email', $request->email) }}" required autofocus readonly>
            </div>
            @error('email')
                <p class="field-error"><i class="bi bi-exclamation-circle"></i> {{ $message }}</p>
            @enderror
        </div>

        <!-- Password Baru -->
        <div class="form-group">
            <label for="password" class="form-label">Kata Sandi Baru</label>
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

        <!-- Konfirmasi -->
        <div class="form-group">
            <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
            <div class="input-wrap">
                <i class="bi bi-lock-fill input-icon"></i>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="form-control" required placeholder="Ulangi kata sandi">
            </div>
        </div>

        <button type="submit" class="btn-submit">
            <i class="bi bi-arrow-repeat"></i> Reset Kata Sandi
        </button>
    </form>
</div>

<div style="text-align:center;">
    <a href="{{ url('/') }}" class="back-home"><i class="bi bi-arrow-left"></i> Kembali ke beranda</a>
</div>
@endsection
