<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerInsertaNotas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("CREATE OR REPLACE FUNCTION InsertarFilas() RETURNS TRIGGER AS $$
            DECLARE 
                estudiante  integer;
                createdat  timestamp;
                updatedat  timestamp;
                profesorr  int;
                gradoo  int;
                materiaa int;   
            BEGIN
                createdat := new.created_at;
                updatedat := new.updated_at;
                profesorr := new.profesor_id;
                gradoo := new.grado_id;
                materiaa := new.materia_id;
                IF EXISTS(SELECT id FROM estudiantes WHERE grado_id=gradoo) THEN
                  FOR estudiante IN SELECT id FROM estudiantes WHERE grado_id=gradoo LOOP
                   IF NOT EXISTS(SELECT * FROM notas WHERE nota_materia=materiaa AND nota_profesor=profesorr
                   AND nota_estudiante=estudiante AND created_at=createdat) THEN
                     INSERT INTO notas (nota1, porcent1, nota2, porcent2, nota3, 
                        porcent3, nota4, porcent4, nota5, porcent5, bimestre1, 
                        bimestre2, bimestre3, bimestre4, definitiva, nota_materia, 
                        nota_profesor, nota_estudiante, created_at, updated_at)
                     VALUES(null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,
                     materiaa,profesorr,estudiante,createdat,updatedat);
                   END IF;
                  END LOOP;
                END IF;
                RETURN NULL;
            END;
            $$ LANGUAGE plpgsql;
            --------------
            CREATE TRIGGER InsertarEstudiantes
            AFTER INSERT ON clases_profesors FOR EACH ROW
            EXECUTE PROCEDURE InsertarFilas();");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("drop trigger InsertarEstudiantes On clases_profesors");
    }
}
