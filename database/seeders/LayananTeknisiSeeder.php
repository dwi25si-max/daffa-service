<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LayananTeknisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Data Layanan (Bengkel Mobil)
        $layananData = [
            [
                'nama_layanan'   => 'Diagnostic Scan ECU & Kelistrikan',
                'kategori'       => 'Diagnostic & Scan',
                'harga'          => 200000,
                'estimasi_waktu' => '45 Menit',
                'deskripsi'      => 'Pengecekan sistem sensor, engine control unit (ECU), dan elektrikal mobil secara akurat dengan scanner OBD-II modern.',
                'ikon'           => 'fa-car-side',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'nama_layanan'   => 'Engine Tune Up & Carbon Cleaner',
                'kategori'       => 'Perbaikan Mesin',
                'harga'          => 350000,
                'estimasi_waktu' => '90 Menit',
                'deskripsi'      => 'Pembersihan ruang bakar, kalibrasi injektor, busi, dan throttle body untuk mengembalikan performa mesin yang prima dan hemat BBM.',
                'ikon'           => 'fa-cogs',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'nama_layanan'   => 'Spooring, Balancing & Rotasi Ban',
                'kategori'       => 'Kaki-kaki & Ban',
                'harga'          => 250000,
                'estimasi_waktu' => '60 Menit',
                'deskripsi'      => 'Penyelarasan sudut roda (camber, caster, toe) menggunakan komputer 3D demi stabilitas kemudi dan keamanan berkendara.',
                'ikon'           => 'fa-circle-notch',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'nama_layanan'   => 'Paket Ganti Oli Mesin & Filter',
                'kategori'       => 'Perawatan Rutin',
                'harga'          => 400000,
                'estimasi_waktu' => '30 Menit',
                'deskripsi'      => 'Penggantian oli mesin sintetis premium beserta filter oli asli untuk menjaga keawetan dan pelumasan mesin mobil.',
                'ikon'           => 'fa-oil-can',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'nama_layanan'   => 'Servis AC & Evaporator Clean',
                'kategori'       => 'Kenyamanan & AC',
                'harga'          => 300000,
                'estimasi_waktu' => '60 Menit',
                'deskripsi'      => 'Flushing kompresor, pembersihan blower dan evaporator, serta pengisian freon R134a murni agar kabin sejuk dan bebas bau.',
                'ikon'           => 'fa-snowflake',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
        ];

        foreach ($layananData as $data) {
            $existing = DB::table('layanan')->where('nama_layanan', $data['nama_layanan'])->first();
            if (!$existing) {
                DB::table('layanan')->insert($data);
            }
        }

        // Ambil ID layanan yang sudah terdaftar
        $layananIds = DB::table('layanan')->pluck('id', 'nama_layanan');

        // 2. Data Teknisi / Mekanik Ahli (Berelasi ke Layanan)
        $teknisiData = [
            [
                'nama_teknisi'     => 'Budi Santoso',
                'layanan_id'       => $layananIds['Engine Tune Up & Carbon Cleaner'] ?? 2,
                'jabatan'          => 'Master Engine Specialist',
                'no_hp'            => '081234567891',
                'pengalaman_tahun' => 10,
                'foto'             => 'team-1.jpg',
                'status'           => 'Aktif',
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'nama_teknisi'     => 'Ahmad Fauzi',
                'layanan_id'       => $layananIds['Diagnostic Scan ECU & Kelistrikan'] ?? 1,
                'jabatan'          => 'Auto Electrician & Diagnostic',
                'no_hp'            => '081234567892',
                'pengalaman_tahun' => 8,
                'foto'             => 'team-2.jpg',
                'status'           => 'Aktif',
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'nama_teknisi'     => 'Dwi Saputra',
                'layanan_id'       => $layananIds['Spooring, Balancing & Rotasi Ban'] ?? 3,
                'jabatan'          => 'Undercarriage & Suspension Pro',
                'no_hp'            => '081234567893',
                'pengalaman_tahun' => 6,
                'foto'             => 'team-3.jpg',
                'status'           => 'Aktif',
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'nama_teknisi'     => 'Hendra Wijaya',
                'layanan_id'       => $layananIds['Paket Ganti Oli Mesin & Filter'] ?? 4,
                'jabatan'          => 'Lube & Quick Service Tech',
                'no_hp'            => '081234567894',
                'pengalaman_tahun' => 5,
                'foto'             => 'team-4.jpg',
                'status'           => 'Aktif',
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
        ];

        foreach ($teknisiData as $t) {
            $existing = DB::table('teknisi')->where('nama_teknisi', $t['nama_teknisi'])->first();
            if (!$existing) {
                DB::table('teknisi')->insert($t);
            }
        }
    }
}
