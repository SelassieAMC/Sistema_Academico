<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->enum('type',['RC','TI','CC','CE']);
            $table->string('name','15');
            $table->string('last_name','15');
             $table->enum('rol',['Estudiante','Profesor','Director','Rector','Administrador']);
            $table->string('telefono','15');
            $table->string('email','100');
            $table->string('direccion','100');
            $table->string('password');
            $table->string('avatarurl')->nullable();
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
