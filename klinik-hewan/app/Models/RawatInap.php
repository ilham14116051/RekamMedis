<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawatInap extends Model
{
    use HasFactory;
    protected $table = 'rawat_inaps';
    protected $guarded = ['id'];
    protected $fillable = [
        'rekam_medis_id',
        'pasien_id',
        'no_ranap',
        'tgl_ranap',
        'total_item',
        'grand_total',
        'total_diskon',
        'total_invoice_ranap',
        'remarks',
    ];

    public function rekam_medis()
    {
        return $this->belongsTo(RekamMedis::class);
    }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
}
