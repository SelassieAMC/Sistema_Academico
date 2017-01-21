<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateViewCorreosinstitucionales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         DB::unprepared("CREATE OR REPLACE VIEW public.correosinstitucionales AS 
                    Select D.grado as grado, D.name as nombre, D.last_name as apellido, U.email as correo, U.avatarurl as avatar
                    from directorcurso D join users U On(D.name=U.name and D.last_name=U.last_name) order by grado");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('drop view correosinstitucionales');
    }
}
