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
        Schema::create('resits', function (Blueprint $table) {
            $table->id();
            $table->string('bayaran_id')->nullable();
            $table->string('no_cukai')->nullable();
            $table->string('tarikh_resit')->nullable();
            $table->string('no_resit')->nullable();
            $table->string('tahun')->nullable();
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
        Schema::dropIfExists('resits');
    }
};
