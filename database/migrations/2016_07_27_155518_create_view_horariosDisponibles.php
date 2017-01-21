<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewHorariosDisponibles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        DB::unprepared("create view horariosDisponibles as
                    select hor_mat_cursos.id, hor_mat_cursos.dia, hor_mat_cursos.horario_id, hor_mat_cursos.materia_id, hor_mat_cursos.curso_id
                    from hor_mat_cursos 
                    left join clases_profesors 
                    on(clases_profesors.materia_id=hor_mat_cursos.materia_id)
                    and (clases_profesors.grado_id=hor_mat_cursos.curso_id)
                    and (clases_profesors.horario_id=hor_mat_cursos.horario_id)
                    and (clases_profesors.dia=hor_mat_cursos.dia)
                    where clases_profesors.materia_id is null");
    }
        //

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        DB::unprepared("drop view horariosDisponibles");
    }
}
