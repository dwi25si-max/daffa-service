<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teknisi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('layanan_id')->constrained('layanan')->onDelete('cascade');
            $table->string('nama_teknisi', 100);
            $table->string('jabatan', 100);
            $table->string('no_hp', 20);
            $table->unsignedSmallInteger('pengalaman_tahun')->default(1);
            $table->string('foto', 100)->nullable()->default('team-1.jpg');
            $table->enum('status', ['Aktif', 'Cuti', 'Nonaktif'])->default('Aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teknisi');
    }
};
