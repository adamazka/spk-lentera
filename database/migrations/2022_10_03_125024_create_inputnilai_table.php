<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInputnilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inputnilai', function (Blueprint $table) {
            $table->increments('id_nilai');
            $table->integer('id_periode')->unsigned();
            $table->integer('id_guru')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->integer('id_kriteria')->unsigned();
            $table->double('total_skor');
            $table->double('nilai_perkopetensi');
            $table->double('nilai_c');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_periode')
                ->references('id_periode')->on('periodes')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('id_guru')
                ->references('id_guru')->on('gurus')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('id_user')
                ->references('id_user')->on('users')
                ->onUpdate('cascade')
                ->onDelete('restrict');

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
        Schema::dropIfExists('inputnilai');
    }
}
