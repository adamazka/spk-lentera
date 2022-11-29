<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKetnilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ketnilais', function (Blueprint $table) {
            $table->increments('id_ketnilai');
            $table->string('nama_ketnilai');
            $table->string('besaran_ketnilai');
            $table->float('nilai_ketnilai');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ketnilais');
    }
}
