<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded = ['id'];
    protected $fillable = [
        'kategori_product_id',
        'kelas_product_id',
        'kd_product',
        'nm_product',
        'purchase_price',
        'sale_price',
        'stock',
        'remarks',
    ];

    public function kelas_product()
    {
        return $this->belongsTo(KelasProduct::class);
    }

    public function kategori_product()
    {
        return $this->belongsTo(KategoriProduct::class);
    }

    public function transaction_details()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
