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
        Schema::create('bayarans', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('noakaun')->nullable();
            $table->string('bil_premis_id')->nullable();
            $table->string('bil_rumah_id')->nullable();
            $table->string('booking_id')->nullable();
            $table->string('st_id')->nullable();
            $table->string('no_ic_pemilik')->nullable();
            $table->string('amaun')->nullable();
            $table->string('tarikh_bayaran')->nullable();
            $table->string('status_bayaran')->nullable();
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
        Schema::dropIfExists('bayarans');
    }
};
