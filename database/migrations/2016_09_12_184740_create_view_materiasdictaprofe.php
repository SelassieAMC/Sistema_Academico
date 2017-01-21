<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewMateriasdictaprofe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
        CREATE OR REPLACE VIEW public.materiasdictaprofe AS 
         SELECT m.nombre AS materia,
            g.name AS grado,
            c.profesor_id AS profesor
           FROM clases_profesors c
             JOIN materias m ON c.materia_id = m.id
             JOIN grados g ON c.grado_id = g.id
          GROUP BY m.nombre, g.name, c.profesor_id;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('drop view materiasdictaprofe');
    }
}
