<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $fillable = [
        'id',
        'name',
        'status',
        'created_at',
        'updated_at',
    ];

    public function loadAllDataCategory(){
        $query = Category::query()->get();
        return $query;
    }
}
