<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanan';

    protected $fillable = [
        'nama_layanan',
        'kategori',
        'harga',
        'estimasi_waktu',
        'deskripsi',
        'ikon',
    ];

    /**
     * Relasi Eloquent: 1 Layanan memiliki banyak Teknisi yang berspesialisasi di bidang tersebut.
     */
    public function teknisi()
    {
        return $this->hasMany(Teknisi::class, 'layanan_id');
    }

    /**
     * Helper accessor untuk format Rupiah.
     */
    public function getHargaRupiahAttribute(): string
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }
}
