<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewMateriaXCurso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //CREATE VIEW materiaSinProfesor AS select * from materias where not exists (select * from rel_materia_profesors where rel_materia_profesors.materia_id = materias.id)
         DB::unprepared("create view HorarioXCurso as select horarios.horario,
                     max(case when hor_mat_cursos.dia = 'Lunes' then materias.nombre end) as Lunes,
                     max(case when hor_mat_cursos.dia = 'Martes' then materias.nombre end) as Martes,
                     max(case when hor_mat_cursos.dia = 'Miercoles' then materias.nombre end) as Miercoles,
                     max(case when hor_mat_cursos.dia = 'Jueves' then materias.nombre end) as Jueves,
                     max(case when hor_mat_cursos.dia = 'Viernes' then materias.nombre end) as Viernes,
                     grados.name
                    --select grados.name
                    from hor_mat_cursos inner join materias on (hor_mat_cursos.materia_id=materias.id) 
                    inner join grados on (hor_mat_cursos.curso_id=grados.id) 
                    inner join horarios on (hor_mat_cursos.horario_id=horarios.id) 

                    group by horario,grados.name
                    order by grados.name");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('drop view HorarioXCurso');
    }
}
