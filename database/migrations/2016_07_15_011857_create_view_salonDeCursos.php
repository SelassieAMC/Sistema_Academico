<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewSalonDeCursos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("CREATE VIEW salonDeCursos AS 
            select rel_grado_salons.id,grados.name, salons.id as salonID, salons.ubicacion 
            from rel_grado_salons 
            INNER JOIN grados ON (rel_grado_salons.grado_id=grados.id) 
            INNER JOIN salons ON (rel_grado_salons.salon_id=salons.id)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP VIEW salonDeCursos");
    }
}
