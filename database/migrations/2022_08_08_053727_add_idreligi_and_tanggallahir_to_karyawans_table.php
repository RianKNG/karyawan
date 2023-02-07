<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdreligiAndTanggallahirToKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('karyawans', function (Blueprint $table) {
            $table->integer('religions_id')->nullable();
            $table->string('tanggal_lahir')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('karyawans', function (Blueprint $table) {
            $table->dropColumn('religions_id')->nullable();
            $table->dropColumn('tanggal_lahir')->nullable();
        });
    }
}
