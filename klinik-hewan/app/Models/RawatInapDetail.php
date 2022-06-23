<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawatInapDetail extends Model
{
    use HasFactory;
    protected $table = 'rawat_inap_details';
    protected $guarded = ['id'];
    protected $fillable = [
        'rawat_inap_id',
        'waktu',
        'product_id',
        'harga',
        'qty',
        'subtotal',
        'disc_amount',
        'disc_percent',
        'total_disc_line',
        'total',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
