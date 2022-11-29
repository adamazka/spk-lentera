<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasiljawabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasiljawabans', function (Blueprint $table) {
            $table->increments('id_nilai');
            $table->integer('id_periode')->unsigned();
            $table->integer('id_guru')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->integer('id_pertanyaan')->unsigned();
            $table->integer('jawaban');
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

            $table->foreign('id_pertanyaan')
                ->references('id_pertanyaan')->on('pertanyaans')
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
        Schema::dropIfExists('hasiljawabans');
    }
}
