<?php

namespace App\Models;

use App\Models\User;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Kyslik\ColumnSortable\Sortable;


class Role extends Model
{
    use HasFactory, Sortable;

    // public function auth() {
    //     return $this->hasMany(Admin::class, User::class);

    // }
    protected $fillable = ['name'];

    public $sortable = ['name'];

    public function user() {
        return $this->hasMany(User::class);
        
    }

}
