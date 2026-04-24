@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="page-header">
    <h2>Selamat datang, {{ Auth::user()->name }}!</h2>
    <p>Anda login sebagai <strong>{{ Auth::user()->email }}</strong>. Kelola inventaris barang melalui menu di atas.</p>
</div>
<div class="d-flex gap-2">
    <a href="{{ route('items.index') }}" class="btn btn-primary"><i class="bi bi-grid-3x3-gap me-2"></i>Lihat Daftar Barang</a>
    <a href="{{ route('items.create') }}" class="btn btn-outline-secondary"><i class="bi bi-plus-lg me-2"></i>Tambah Barang</a>
</div>
@endsection
