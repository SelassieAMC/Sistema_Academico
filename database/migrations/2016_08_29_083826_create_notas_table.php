<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
          $table->increments('id');
          $table->float('nota1')->nullable();
          $table->float('porcent1')->nullable();
          $table->float('nota2')->nullable();
          $table->float('porcent2')->nullable();
          $table->float('nota3')->nullable();
          $table->float('porcent3')->nullable();
          $table->float('nota4')->nullable();
          $table->float('porcent4')->nullable();
          $table->float('nota5')->nullable();
          $table->float('porcent5')->nullable();
          $table->float('bimestre1')->nullable();
          $table->float('bimestre2')->nullable();
          $table->float('bimestre3')->nullable();
          $table->float('bimestre4')->nullable();
          $table->float('definitiva')->nullable();
          $table->integer('nota_materia')->unsigned();
          $table->integer('nota_profesor')->unsigned();
          $table->integer('nota_estudiante')->unsigned();
          $table->timestamps();

          $table->foreign('nota_materia')->references('id')->on('materias')->onDelete('cascade');
          $table->foreign('nota_profesor')->references('id')->on('users')->onDelete('cascade');
          $table->foreign('nota_estudiante')->references('id')->on('estudiantes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('notas');
    }
}
