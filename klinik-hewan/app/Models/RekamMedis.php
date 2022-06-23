<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;
    protected $table = 'rekam_medis';
    protected $guarded = ['id'];
    protected $fillable = [
        'pasien_id',
        'no_rm',
        'tgl_rm',
        'suhu_tubuh',
        'berat_badan',
        'age',
        'keluhan',
        'kondisi',
        'diagnosa',
        'tindakan',
        'remarks',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
}
