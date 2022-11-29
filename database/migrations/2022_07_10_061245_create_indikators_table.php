<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndikatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indikators', function (Blueprint $table) {
            $table->increments('id_indikator');
            $table->integer('id_kriteria')->unsigned();
            $table->text('nama_indikator');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_kriteria')
                ->references('id_kriteria')->on('kriterias')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indikators');
    }
}
