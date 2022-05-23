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
        Schema::create('dewans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('harga')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('kod_urusan')->nullable();
            $table->integer('hari');
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
        Schema::dropIfExists('dewans');
    }
};
