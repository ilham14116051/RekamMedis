<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasiens';
    protected $guarded = ['id'];
    protected $fillable = [
        'nm_hewan',
        'jenis_hewan',
        'spesies',
        'sex',
        'nm_pemilik',
        'phone',
        'address',
        'remarks',
    ];
}
