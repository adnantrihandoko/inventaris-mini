<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['nama_barang', 'stok', 'kategori_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }
}
