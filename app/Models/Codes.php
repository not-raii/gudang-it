<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;


class Codes extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'jumlah_barang',
        'categories_id',
        'created_at',
    ];

    public $sortable = ['kode_barang', 'nama_barang', 'categories_id'];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }

    public function barangMasuk () {
        return $this->hasMany(BarangMasuk::class, 'codes_id', 'id');
    }
    public function barangKeluar () {
        return $this->hasMany(BarangKeluar::class, 'codes_id', 'id');
    }

    

    // public function geStockMasukAttribute() {
    //     return BarangMasuk::where(function($query) {
    //         $query->where('codes_id', $this->attributes['id'])->whereRaw('qty');
    //     })->count();
    // }

}
