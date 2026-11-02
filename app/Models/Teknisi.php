<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teknisi extends Model
{
    use HasFactory;

    protected $table = 'teknisi';

    protected $fillable = [
        'layanan_id',
        'nama_teknisi',
        'jabatan',
        'no_hp',
        'pengalaman_tahun',
        'foto',
        'status',
    ];

    /**
     * Relasi Eloquent: Teknisi berada di bawah naungan 1 spesialisasi Layanan.
     */
    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }
}
