@extends('layouts.guest')
@section('title', 'Konfirmasi Kata Sandi — Inventaris Mini')

@section('auth-content')
<div class="auth-card-head">
    <div class="auth-logo-mark">📦</div>
    <h1>Konfirmasi Kata Sandi</h1>
    <p>Ini area aman. Masukkan password Anda untuk melanjutkan.</p>
</div>

<div class="auth-card-body">
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="form-group">
            <label for="password" class="form-label">Kata Sandi</label>
            <div class="input-wrap">
                <i class="bi bi-lock input-icon"></i>
                <input type="password" id="password" name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    required autocomplete="current-password" placeholder="••••••••">
            </div>
            @error('password')
                <p class="field-error"><i class="bi bi-exclamation-circle"></i> {{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn-submit">
            <i class="bi bi-shield-check"></i> Konfirmasi
        </button>
    </form>
</div>

<div style="text-align:center;">
    <a href="{{ url('/') }}" class="back-home"><i class="bi bi-arrow-left"></i> Kembali ke beranda</a>
</div>
@endsection
