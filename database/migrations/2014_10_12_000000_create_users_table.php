<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id_user');
            $table->integer('id_role')->unsigned();
            $table->integer('id_guru')->unsigned();
            $table->string('username');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_role')
                ->references('id_role')->on('roles')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('id_guru')
                ->references('id_guru')->on('gurus')
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
        Schema::dropIfExists('users');
    }
}
