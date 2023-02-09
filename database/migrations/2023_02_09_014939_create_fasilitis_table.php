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
        Schema::create('fasilitis', function (Blueprint $table) {
            $table->id();
            $table->string('bandar');
            $table->string('fasiliti');
            $table->string('kadar_per_jam');
            $table->string('masa_operasi');
            $table->string('hari_operasi');
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
        Schema::dropIfExists('fasilitis');
    }
};
