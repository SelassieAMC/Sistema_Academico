<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewSalonesdictaprofe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("CREATE OR REPLACE VIEW public.salonesdictaprofe AS 
 SELECT s.grado,
    s.nombre,
    s.apellido,
    s.salon,
    s.ubicacion,
    s.descripcion,
    s.foto,
    hp.profesor
   FROM salondirector s
     JOIN horarioprofes hp ON s.grado::text = hp.grado::text
  GROUP BY s.grado, s.nombre, s.apellido, s.salon, s.ubicacion, s.descripcion, s.foto, hp.profesor;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("drop view salonesdictaprofe");
    }
}
