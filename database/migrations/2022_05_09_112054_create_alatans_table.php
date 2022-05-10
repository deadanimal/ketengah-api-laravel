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
        Schema::create('alatans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_alatan');
            $table->string('kod_urusan')->nullable();
            $table->string('kod_sub_urusan')->nullable();
            $table->string('harga')->nullable();
            $table->integer('bilangan')->nullable();
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
        Schema::dropIfExists('alatans');
    }
};
