<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertanyaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanyaans', function (Blueprint $table) {
            $table->increments('id_pertanyaan');
            $table->integer('id_kriteria')->unsigned();
            $table->integer('id_indikator')->unsigned();
            $table->text('pertanyaan');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_kriteria')
                ->references('id_kriteria')->on('kriterias')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('id_indikator')
                ->references('id_indikator')->on('indikators')
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
        Schema::dropIfExists('pertanyaans');
    }
}
