<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perumahans', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('nama')->nullable();
            $table->string('bandar')->nullable();
            $table->string('no_kad_pengenalan')->nullable();
            $table->string('no_rumah')->nullable();
            $table->string('taman')->nullable();
            $table->string('kod_kategori')->nullable();
            $table->string('kategori')->nullable();
            $table->string('kadar_sewa')->nullable();
            $table->string('jenis_rumah')->nullable();
            $table->string('jumlah_telah_bayar')->nullable();
            $table->string('jumlah_pinjaman')->nullable();
            $table->string('jumlah_tunggakan')->nullable();
            $table->string('tarikh_mula_perjanjian')->nullable();
            $table->string('tarikh_tamat_perjanjian')->nullable();
            $table->string('jumlah_baki')->nullable();
            $table->string('no_akaun_rumah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perumahans');
    }
};
