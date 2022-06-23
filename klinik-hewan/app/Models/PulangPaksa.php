<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PulangPaksa extends Model
{
    use HasFactory;
    protected $table = 'pulang_paksas';
    protected $guarded = ['id'];
    protected $fillable = [
        'rekam_medis_id',
        'tgl_pulang',
        'alasan_pulang',
        'remarks',
    ];

    public function rekam_medis()
    {
        return $this->belongsTo(RekamMedis::class);
    }
}
