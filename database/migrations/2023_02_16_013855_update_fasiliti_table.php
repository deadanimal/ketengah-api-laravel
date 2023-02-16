<?php

use App\Models\Lokasi;
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
        Schema::table('fasilitis', function (Blueprint $table) {
            $table->foreignIdFor(Lokasi::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fasilitis', function (Blueprint $table) {
            $table->dropColumn('lokasi_id');
        });
    }
};
