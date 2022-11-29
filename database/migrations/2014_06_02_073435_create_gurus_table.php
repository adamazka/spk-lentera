<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->increments('id_guru');
            $table->string('nama_guru')->nullable();
            $table->text('alamat_guru')->nullable();
            $table->date('tahun_masuk')->nullable();
            $table->date('tahun_keluar')->nullable();
            $table->string('tlp_guru')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('no_ktp_guru')->nullable();
            $table->string('no_kk_guru')->nullable();
            $table->string('pen_akhir_guru')->nullable();
            $table->string('jabatan_guru')->nullable();
            $table->string('status_aktif_guru')->nullable();
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
        Schema::dropIfExists('gurus');
    }
}
