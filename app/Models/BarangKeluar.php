<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class BarangKeluar extends Model
{
    use HasFactory, Sortable;

    protected $fillable = ['codes_id', 'tgl_keluar', 'qty'];

    public $sortable = ['codes_id', 'tgl_keluar'];

    public function codes()
    {
        return $this->belongsTo(Codes::class, 'codes_id','id');
    }
    public function logBarang()
    {
        return $this->hasMany(LogBarang::class);
    }   
}
