<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('religion_id')->unsigned();
            // $table->foreignId('religion_id')->constrained('religions')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama');
            $table->string('alamat');
            $table->enum('jeniskelamin',['laki-laki','perempuan']);
            $table->bigInteger('notlp');
            $table->string('foto');
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
        Schema::dropIfExists('karyawans');
    }
}
