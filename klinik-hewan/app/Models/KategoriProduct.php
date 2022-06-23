<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriProduct extends Model
{
    use HasFactory;
    protected $table = 'kategori_products';
    protected $guarded = ['id'];
    protected $fillable = [
        'kd_kategori_product',
        'nm_kategori_product',
        'remarks',
    ];
}
