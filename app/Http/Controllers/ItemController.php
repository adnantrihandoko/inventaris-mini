<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // Menampilkan semua data barang + fitur pencarian
    public function index(Request $request)
    {
        $search = $request->input('search');
        $items = Item::with('category')
            ->when($search, function ($query, $search) {
                return $query->where('nama_barang', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10);

        return view('items.index', compact('items', 'search'));
    }

    // Form tambah barang
    public function create()
    {
        $categories = Category::all();
        return view('items.create', compact('categories'));
    }

    // Simpan barang baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'kategori_id' => 'required|exists:categories,id',
        ]);

        Item::create($validated);

        return redirect()->route('items.index')
            ->with('success', 'Barang berhasil ditambahkan.');
    }

    // Form edit barang
    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('items.edit', compact('item', 'categories'));
    }

    // Update barang
    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'kategori_id' => 'required|exists:categories,id',
        ]);

        $item->update($validated);

        return redirect()->route('items.index')
            ->with('success', 'Barang berhasil diperbarui.');
    }

    // Hapus barang
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')
            ->with('success', 'Barang berhasil dihapus.');
    }
}
