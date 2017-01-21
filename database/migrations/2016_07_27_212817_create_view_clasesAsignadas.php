<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewClasesAsignadas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         DB::unprepared("create view clasesAsignadas as select horarios.horario,
                        max(case when clases_profesors.dia = 'Lunes' then materias.nombre end) as Lunes,
                        max(case when clases_profesors.dia = 'Martes' then materias.nombre end) as Martes,
                            max(case when clases_profesors.dia = 'Miercoles' then materias.nombre end) as Miercoles,
                            max(case when clases_profesors.dia = 'Jueves' then materias.nombre end) as Jueves,
                            max(case when clases_profesors.dia = 'Viernes' then materias.nombre end) as Viernes,
                            grados.name,
                        clases_profesors.profesor_id
                        

                        from clases_profesors 
                        inner join horarios on(horarios.id=clases_profesors.horario_id)
                        inner join grados on (grados.id=clases_profesors.grado_id)
                        inner join materias on (materias.id=clases_profesors.materia_id)
                        group by horario,name, profesor_id
                        order by horario");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("drop view clasesAsignadas");
    }
}
