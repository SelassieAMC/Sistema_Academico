<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewDirectorGrado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("CREATE VIEW directorCurso AS 
            SELECT grados.id,
            grados.name AS grado,
            users.name,
            users.last_name,
            rel_grado_salons.salon_id
           FROM users,
            grados, rel_grado_salons
          WHERE users.id = grados.director_id and grados.id=rel_grado_salons.grado_id;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('drop view directorCurso');
    }
}
