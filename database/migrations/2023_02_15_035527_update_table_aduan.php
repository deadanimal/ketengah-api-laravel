<?php

use App\Models\Perumahan;
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
        Schema::table('aduans', function (Blueprint $table) {
            $table->foreignIdFor(Perumahan::class)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aduans', function (Blueprint $table) {
            $table->dropColumn('perumahans_id');
        });
    }
};
