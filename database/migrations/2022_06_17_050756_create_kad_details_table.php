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
        Schema::create('kad_details', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('nama')->nullable();
            $table->string('kadno')->nullable();
            $table->string('csv')->nullable();
            $table->string('termination_date')->nullable();
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
        Schema::dropIfExists('kad_details');
    }
};
