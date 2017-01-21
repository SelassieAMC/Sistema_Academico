<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewClasesXAsignar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("create view clasesXAsignar as select horarios.horario,
                     max(case when horariosDisponibles.dia = 'Lunes' then materias.nombre end) as Lunes,
                     max(case when horariosDisponibles.dia = 'Martes' then materias.nombre end) as Martes,
                     max(case when horariosDisponibles.dia = 'Miercoles' then materias.nombre end) as Miercoles,
                     max(case when horariosDisponibles.dia = 'Jueves' then materias.nombre end) as Jueves,
                     max(case when horariosDisponibles.dia = 'Viernes' then materias.nombre end) as Viernes,
                     grados.name
                    from horariosDisponibles inner join materias on (horariosDisponibles.materia_id=materias.id) 
                    inner join grados on (horariosDisponibles.curso_id=grados.id) 
                    inner join horarios on (horariosDisponibles.horario_id=horarios.id) 

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
         DB::unprepared("drop view clasesXAsignar");
    }
}
