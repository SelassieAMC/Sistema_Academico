<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewSalondirector extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("CREATE OR REPLACE VIEW public.salondirector AS 
             SELECT d.grado,
                d.name AS nombre,
                d.last_name AS apellido,
                d.salon_id AS salon,
                s.ubicacion,
                s.descripcion,
                s.foto
               FROM directorcurso d
                 JOIN salons s ON d.salon_id = s.id
              ORDER BY d.salon_id;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("drop view salondirector");
    }
}
