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
        Schema::create('persyaratans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');

            $table->foreignId('Temperature_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->date('tgl'); // Menggunakan tipe data 'date' untuk tanggal
            $table->integer('nip');
            $table->text('hp');
            $table->string('perusahaan'); // Menggunakan tipe data 'string' untuk perusahaan
            $table->text('Capacity');
            $table->integer('tahun');
            $table->string('foto_sampul');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persyaratans');
    }
};
