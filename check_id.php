<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$rows = App\Models\Pelanggan::all(['pelanggan_id','first_name']);
foreach ($rows as $r) {
    echo $r->pelanggan_id . " - " . $r->first_name . "\n";
}
