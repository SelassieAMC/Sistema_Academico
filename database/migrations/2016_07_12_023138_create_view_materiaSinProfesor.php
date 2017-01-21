<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewMateriaSinProfesor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //CREATE VIEW materiaSinProfesor AS select * from materias where not exists (select * from rel_materia_profesors where rel_materia_profesors.materia_id = materias.id)
         DB::unprepared("CREATE VIEW materiaSinProfesor AS
            select * from materias where not exists(
                select * from rel_materia_profesors 
                where rel_materia_profesors.materia_id = materias.id)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('drop view materiaSinProfesor');
    }
}
