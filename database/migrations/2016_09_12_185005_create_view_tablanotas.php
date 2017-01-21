<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewTablanotas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("CREATE OR REPLACE VIEW public.tablanotas AS 
         SELECT n.id,
            u.name AS nombre,
            u.last_name AS apellido,
            n.nota1,
            n.porcent1,
            n.nota2,
            n.porcent2,
            n.nota3,
            n.porcent3,
            n.nota4,
            n.porcent4,
            n.nota5,
            n.porcent5,
            n.bimestre1,
            n.bimestre2,
            n.bimestre3,
            n.bimestre4,
            n.definitiva,
            m.nombre AS materia,
            g.name AS grado,
            n.nota_profesor AS profesor,
            n.nota_estudiante AS estudiante,
            n.nota_materia AS nmateria,
            n.created_at
           FROM notas n
             JOIN estudiantes e ON n.nota_estudiante = e.id
             JOIN users u ON e.user_id = u.id
             JOIN materias m ON n.nota_materia = m.id
             JOIN grados g ON e.grado_id = g.id;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("drop view tablanotas");
    }
}
