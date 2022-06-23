<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $guarded = ['id'];
    protected $fillable = [
        'pasien_id',
        'invoice',
        'tgl_transaction',
        'total_item',
        'grand_total',
        'total_diskon',
        'total_invoice',
        'remarks',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
}
