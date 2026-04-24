@extends('layouts.app')
@section('title', 'Tambah Barang')

@section('content')

<style>
    .form-card-header {
        padding: 24px 32px 20px;
        border-bottom: 1px solid var(--clr-border);
        display: flex;
        align-items: center;
        gap: 14px;
    }
    .form-card-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        background: linear-gradient(135deg, var(--clr-primary), #818cf8);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
        flex-shrink: 0;
    }
    .form-card-title { font-size: 1.1rem; margin: 0; }
    .form-card-subtitle { font-size: 0.82rem; color: var(--clr-muted); margin: 0; }

    .form-section { padding: 28px 32px; }

    .form-footer {
        padding: 18px 32px;
        border-top: 1px solid var(--clr-border);
        background: #fafbff;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 10px;
    }

    .form-group-hint {
        font-size: 0.78rem;
        color: #94a3b8;
        margin-top: 5px;
    }

    @media (max-width: 576px) {
        .form-card-header, .form-section, .form-footer { padding-left: 18px; padding-right: 18px; }
    }
</style>

<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb" style="font-size:.82rem; background:none; padding:0; margin:0;">
        <li class="breadcrumb-item">
            <a href="{{ route('items.index') }}" style="color:var(--clr-primary); text-decoration:none;">
                <i class="bi bi-box-seam me-1"></i> Barang
            </a>
        </li>
        <li class="breadcrumb-item active" style="color:var(--clr-muted);">Tambah Baru</li>
    </ol>
</nav>

<!-- Page Header -->
<div class="page-header">
    <h2>Tambah Barang Baru</h2>
    <p>Isi detail barang yang ingin ditambahkan ke inventaris</p>
</div>

<!-- Form Card -->
<div class="card-panel" style="max-width: 640px;">

    <div class="form-card-header">
        <div class="form-card-icon">
            <i class="bi bi-plus-lg"></i>
        </div>
        <div>
            <p class="form-card-title">Data Barang</p>
            <p class="form-card-subtitle">Semua field bertanda * wajib diisi</p>
        </div>
    </div>

    <form action="{{ route('items.store') }}" method="POST" novalidate>
        @csrf

        <div class="form-section">

            <!-- Nama Barang -->
            <div class="mb-4">
                <label for="nama_barang" class="form-label">
                    Nama Barang <span style="color:var(--clr-danger);">*</span>
                </label>
                <input
                    type="text"
                    id="nama_barang"
                    name="nama_barang"
                    class="form-control @error('nama_barang') is-invalid @enderror"
                    value="{{ old('nama_barang') }}"
                    placeholder="Contoh: Laptop ASUS VivoBook"
                    autofocus
                >
                @error('nama_barang')
                    <div class="invalid-feedback">
                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                    </div>
                @enderror
                <p class="form-group-hint">Gunakan nama yang deskriptif dan mudah dicari</p>
            </div>

            <!-- Stok -->
            <div class="mb-4">
                <label for="stok" class="form-label">
                    Stok <span style="color:var(--clr-danger);">*</span>
                </label>
                <input
                    type="number"
                    id="stok"
                    name="stok"
                    class="form-control @error('stok') is-invalid @enderror"
                    value="{{ old('stok') }}"
                    placeholder="0"
                    min="0"
                    style="max-width: 180px;"
                >
                @error('stok')
                    <div class="invalid-feedback">
                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                    </div>
                @enderror
                <p class="form-group-hint">Masukkan jumlah stok awal (minimal 0)</p>
            </div>

            <!-- Kategori -->
            <div class="mb-2">
                <label for="kategori_id" class="form-label">
                    Kategori <span style="color:var(--clr-danger);">*</span>
                </label>
                <select
                    id="kategori_id"
                    name="kategori_id"
                    class="form-select @error('kategori_id') is-invalid @enderror"
                    style="max-width: 320px;"
                >
                    <option value="">— Pilih Kategori —</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('kategori_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->nama_kategori }}
                        </option>
                    @endforeach
                </select>
                @error('kategori_id')
                    <div class="invalid-feedback">
                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                    </div>
                @enderror
            </div>

        </div>

        <!-- Footer -->
        <div class="form-footer">
            <a href="{{ route('items.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Batal
            </a>
            <button type="submit" class="btn btn-success">
                <i class="bi bi-check-lg me-1"></i> Simpan Barang
            </button>
        </div>

    </form>
</div>

@endsection
