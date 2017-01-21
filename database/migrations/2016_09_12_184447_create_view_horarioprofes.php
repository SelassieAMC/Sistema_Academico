<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewHorarioprofes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
              DB::unprepared("CREATE OR REPLACE VIEW public.horarioprofes AS 
                SELECT h.horario,
                max(
                    CASE
                        WHEN c.dia::text = 'Lunes'::text THEN m.nombre
                        ELSE NULL::character varying
                    END::text) AS lunes,
                max(
                    CASE
                        WHEN c.dia::text = 'Martes'::text THEN m.nombre
                        ELSE NULL::character varying
                    END::text) AS martes,
                max(
                    CASE
                        WHEN c.dia::text = 'Miercoles'::text THEN m.nombre
                        ELSE NULL::character varying
                    END::text) AS miercoles,
                max(
                    CASE
                        WHEN c.dia::text = 'Jueves'::text THEN m.nombre
                        ELSE NULL::character varying
                    END::text) AS jueves,
                max(
                    CASE
                        WHEN c.dia::text = 'Viernes'::text THEN m.nombre
                        ELSE NULL::character varying
                    END::text) AS viernes,
                g.name AS grado,
                c.profesor_id AS profesor
               FROM clases_profesors c
                 JOIN materias m ON c.materia_id = m.id
                 JOIN grados g ON c.grado_id = g.id
                 JOIN horarios h ON c.horario_id = h.id
              GROUP BY h.horario, g.name, c.profesor_id
              ORDER BY h.horario, g.name;");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('drop view horarioprofes');
    }
}
