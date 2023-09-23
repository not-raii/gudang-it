<?php

namespace App\Models;

use App\Models\LogBarang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;
use Kyslik\ColumnSortable\Sortable;


class Category extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'nama_kategori',
    ];

    public $sortable = ['nama_kategori'];

    public function codes()
    {
        return $this->hasMany(Code::class);
    }   
    public function logBarang()
    {
        return $this->hasMany(LogBarang::class);
    }   
}
