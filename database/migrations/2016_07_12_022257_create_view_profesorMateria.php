<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewProfesorMateria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //CREATE VIEW profesorMateria AS select materias.id,materias.nombre,materias.descripcion,'materias.intensidadHor',users.id as doc,users.name,users.last_name from users,materias,rel_materia_profesors where rel_materia_profesors.materia_id=materias.id and rel_materia_profesors.profesor_id=users.id

        DB::unprepared("CREATE VIEW profesorMateria AS 
            select materias.id,materias.nombre,materias.descripcion,materias.intensidadhor,users.id as doc,users.name,users.last_name 
            from users,materias,rel_materia_profesors 
            where rel_materia_profesors.materia_id=materias.id and rel_materia_profesors.profesor_id=users.id");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('drop view profesorMateria');
    }
}
