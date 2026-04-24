@extends('layouts.guest')
@section('title', 'Lupa Kata Sandi — Inventaris Mini')

@section('auth-content')
<div class="auth-card-head">
    <div class="auth-logo-mark">📦</div>
    <h1>Lupa Kata Sandi</h1>
    <p>Masukkan email Anda untuk menerima link reset</p>
</div>

<div class="auth-card-body">
    @if(session('status'))
        <div class="status-alert">
            <i class="bi bi-check-circle-fill"></i>
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group">
            <label for="email" class="form-label">Alamat Email</label>
            <div class="input-wrap">
                <i class="bi bi-envelope input-icon"></i>
                <input type="email" id="email" name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" required autofocus placeholder="nama@email.com">
            </div>
            @error('email')
                <p class="field-error"><i class="bi bi-exclamation-circle"></i> {{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn-submit">
            <i class="bi bi-envelope-arrow-up"></i> Kirim Link Reset
        </button>
    </form>

    <div class="auth-links">
        <a href="{{ route('login') }}"><i class="bi bi-arrow-left me-1"></i>Kembali ke login</a>
    </div>
</div>

<div style="text-align:center;">
    <a href="{{ url('/') }}" class="back-home"><i class="bi bi-arrow-left"></i> Kembali ke beranda</a>
</div>
@endsection
