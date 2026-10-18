<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

App\Models\Pelanggan::firstOrCreate(
    ['email' => 'budi.santoso@gmail.com'],
    [
        'first_name' => 'Budi',
        'last_name' => 'Santoso',
        'birthday' => '1995-05-14',
        'gender' => 'Male',
        'phone' => '081234567890'
    ]
);

App\Models\Pelanggan::firstOrCreate(
    ['email' => 'siti.aminah@gmail.com'],
    [
        'first_name' => 'Siti',
        'last_name' => 'Aminah',
        'birthday' => '1998-11-20',
        'gender' => 'Female',
        'phone' => '082198765432'
    ]
);

App\Models\Pelanggan::firstOrCreate(
    ['email' => 'daffa.alghifari@gmail.com'],
    [
        'first_name' => 'Daffa',
        'last_name' => 'Al Ghifari',
        'birthday' => '2000-01-10',
        'gender' => 'Male',
        'phone' => '085712349999'
    ]
);

echo "Total pelanggan: " . App\Models\Pelanggan::count() . PHP_EOL;
