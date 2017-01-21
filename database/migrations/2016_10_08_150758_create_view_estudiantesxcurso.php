<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewEstudiantesxcurso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         DB::unprepared("create or replace view estudiantesxcurso as
select U.name as nombre, U.last_name as apellido, U.email as correo,E.acudiente, G.name grado  from estudiantes E join
 users U On(E.user_id=U.id) join grados G ON(E.grado_id=G.id)");
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         DB::unprepared("drop view estudiantesxcurso");
    }

}
