<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePeneliti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peneliti', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 255);
            $table->string('nip',255);
            $table->integer('jabatan');
            $table->string('pendidikan', 15);
            $table->integer('pangkat');
            $table->integer('spesifik');
            $table->dateTime('pensiun');
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
        Schema::drop('peneliti');
    }
}
