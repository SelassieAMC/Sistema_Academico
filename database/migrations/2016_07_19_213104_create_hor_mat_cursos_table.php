<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorMatCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hor_mat_cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('dia',array('Lunes','Martes','Miercoles','Jueves','Viernes'));
            $table->integer('horario_id')->unsigned();
            $table->integer('materia_id')->unsigned();
            $table->integer('curso_id')->unsigned();
            $table->timestamps();

            $table->foreign('horario_id')->references('id')->on('horarios')->onDelete('cascade');
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade');
            $table->foreign('curso_id')->references('id')->on('grados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hor_mat_cursos');
    }
}
