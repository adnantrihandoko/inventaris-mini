@extends('layouts.app')
@section('title', 'Daftar Barang')

@section('content')

<style>
    /* Index-specific styles */
    .search-wrap {
        position: relative;
        max-width: 320px;
    }
    .search-wrap .bi-search {
        position: absolute;
        left: 13px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--clr-muted);
        font-size: 0.85rem;
        pointer-events: none;
    }
    .search-wrap input {
        padding-left: 36px !important;
    }
    .action-bar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
        padding: 18px 24px;
        border-bottom: 1px solid var(--clr-border);
        background: #fafbff;
    }
    .table-info-bar {
        padding: 10px 24px;
        font-size: 0.8rem;
        color: var(--clr-muted);
        background: #fafbff;
        border-bottom: 1px solid var(--clr-border);
    }
    .empty-state {
        text-align: center;
        padding: 60px 24px;
        color: var(--clr-muted);
    }
    .empty-state .empty-icon {
        font-size: 3rem;
        margin-bottom: 14px;
        opacity: .6;
    }
    .empty-state p { font-size: 0.9rem; margin: 0; }
    .pagination-wrap { padding: 16px 24px; border-top: 1px solid var(--clr-border); }
    .row-number { color: var(--clr-muted); font-size: 0.82rem; font-weight: 600; }
    .item-name { font-weight: 500; }
</style>

<!-- Page Header -->
<div class="page-header">
    <h2>Daftar Barang</h2>
    <p>Kelola seluruh data inventaris barang Anda</p>
</div>

<!-- Table Card -->
<div class="card-panel table-panel">

    <!-- Action Bar -->
    <div class="action-bar">
        <form action="{{ route('items.index') }}" method="GET">
            <div class="d-flex gap-2 align-items-center">
                <div class="search-wrap">
                    <i class="bi bi-search"></i>
                    <input
                        type="text"
                        name="search"
                        class="form-control form-control-sm"
                        placeholder="Cari nama barang..."
                        value="{{ request('search') }}"
                    >
                </div>
                <button type="submit" class="btn btn-secondary btn-sm">Cari</button>
                @if(request('search'))
                    <a href="{{ route('items.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-x-lg"></i>
                    </a>
                @endif
            </div>
        </form>

        <a href="{{ route('items.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg me-1"></i> Tambah Barang
        </a>
    </div>

    @if(request('search'))
        <div class="table-info-bar">
            Menampilkan hasil pencarian untuk <strong>"{{ request('search') }}"</strong>
            &mdash; {{ $items->total() }} barang ditemukan
        </div>
    @endif

    <!-- Table -->
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="width:48px; text-align:center;">#</th>
                    <th>Nama Barang</th>
                    <th style="width:120px; text-align:center;">Stok</th>
                    <th style="width:180px;">Kategori</th>
                    <th style="width:160px; text-align:right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $index => $item)
                <tr>
                    <td class="row-number text-center">{{ $items->firstItem() + $index }}</td>
                    <td>
                        <span class="item-name">{{ $item->nama_barang }}</span>
                    </td>
                    <td class="text-center">
                        @php $stok = $item->stok; @endphp
                        <span class="stock-badge {{ $stok == 0 ? 'zero' : ($stok <= 5 ? 'low' : 'high') }}">
                            {{ $stok }}
                        </span>
                    </td>
                    <td>
                        <span class="badge-category">{{ $item->category->nama_kategori }}</span>
                    </td>
                    <td class="text-end">
                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('items.edit', $item) }}"
                               class="btn btn-warning btn-sm"
                               title="Edit">
                                <i class="bi bi-pencil me-1"></i>
                            </a>
                            <form action="{{ route('items.destroy', $item) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-0">
                        <div class="empty-state">
                            <div class="empty-icon">📭</div>
                            <p class="fw-semibold mb-1">Belum ada data barang</p>
                            <p>
                                @if(request('search'))
                                    Tidak ada barang yang cocok dengan pencarian Anda.
                                @else
                                    Mulai dengan menambahkan barang pertama Anda.
                                @endif
                            </p>
                            @if(!request('search'))
                                <a href="{{ route('items.create') }}" class="btn btn-primary btn-sm mt-3">
                                    <i class="bi bi-plus-lg me-1"></i> Tambah Sekarang
                                </a>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($items->hasPages())
    <div class="pagination-wrap d-flex justify-content-between align-items-center flex-wrap gap-2">
        <span style="font-size:.82rem; color:var(--clr-muted);">
            Menampilkan {{ $items->firstItem() }}–{{ $items->lastItem() }}
            dari {{ $items->total() }} barang
        </span>
        {{ $items->appends(request()->query())->links() }}
    </div>
    @endif

</div>

@endsection
