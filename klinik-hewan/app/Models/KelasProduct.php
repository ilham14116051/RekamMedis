<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasProduct extends Model
{
    use HasFactory;
    protected $table = 'kelas_products';
    protected $guarded = ['id'];
    protected $fillable = [
        'kd_kelas_product',
        'nm_kelas_product',
        'remarks',
    ];
}
