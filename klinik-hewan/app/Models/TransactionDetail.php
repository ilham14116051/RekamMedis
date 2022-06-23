<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $table = 'transaction_details';
    protected $guarded = ['id'];
    protected $fillable = [
        'transaction_id',
        'product_id',
        'harga',
        'qty',
        'subtotal',
        'disc_amount',
        'disc_percent',
        'total_disc_line',
        'total',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
