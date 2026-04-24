@extends('layouts.guest')
@section('title', 'Verifikasi Email — Inventaris Mini')

@section('auth-content')
<div class="auth-card-head">
    <div class="auth-logo-mark">📦</div>
    <h1>Verifikasi Email Anda</h1>
    <p>Sebelum melanjutkan, periksa email Anda untuk link verifikasi.</p>
</div>

<div class="auth-card-body">
    @if (session('status') == 'verification-link-sent')
        <div class="status-alert">
            <i class="bi bi-check-circle-fill"></i>
            Link verifikasi baru telah dikirim ke email Anda.
        </div>
    @endif

    <p class="mb-4" style="font-size:0.9rem; color: var(--clr-muted);">
        Jika Anda tidak menerima email, klik tombol di bawah untuk mengirim ulang.
    </p>

    <div class="d-flex flex-column gap-3">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn-submit">
                <i class="bi bi-envelope-arrow-up"></i> Kirim Ulang Email Verifikasi
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" style="background:none; border:none; color:var(--clr-muted); font-size:0.85rem; text-decoration:underline; cursor:pointer;">
                <i class="bi bi-box-arrow-right me-1"></i> Keluar
            </button>
        </form>
    </div>
</div>

<div style="text-align:center;">
    <a href="{{ url('/') }}" class="back-home"><i class="bi bi-arrow-left"></i> Kembali ke beranda</a>
</div>
@endsection
