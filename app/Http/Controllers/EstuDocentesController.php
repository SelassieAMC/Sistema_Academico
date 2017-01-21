<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Grado;
use App\Materia;
use App\Horario;
use App\clasesProfesor;
use App\Estudiante;
use Storage;
use DB;
use Session;
use Redirect;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class EstuDocentesController extends Controller
{
    public function clasesProfesor(){
    	$profesores=DB::select(DB::raw("select distinct doc,name,last_name from profesormateria"));

    	return view('administracion.asignacionesProfEstu.clasDocente',compact('profesores'));
    }

    public function asignarCla($id){
    	$materias=DB::select(DB::raw("select nombre from profesormateria where (doc='$id')"));
    	$contar=count($materias);

    	if($contar>0){
    		$horariosDisp=DB::select(DB::raw("select * from clasesXAsignar"));
    		//return $horariosDisp;
            return view("administracion.asignacionesProfEstu.form_asignarClasesProfesor",compact("materias","horariosDisp","id"));   
		}
		else{
			\Session::flash('messageAlert',' El profesor seleccionado no tiene materias asignadas, verifique las asignaciones en el modulo materias');
            return Redirect::to('asignaHorariosProf');                          
		}
    }

    public function registAsignada(Request $request){
    	$idProfesor= Input::get('idProfesor');
    	$matLunes = Input::get('materiasLun'); //Materias lunes seccionadas en la vista
    	$matMartes = Input::get('materiasMar'); 
    	$matMiercoles = Input::get('materiasMier'); 
    	$matJueves = Input::get('materiasJuev');
    	$matViernes = Input::get('materiasViern');

    	$salvaLunes=false;
    	$salvaMartes=false;
    	$salvaMiercoles=false;
    	$salvaJueves=false;
    	$salvaViernes=false;  

    	$contMatLunes=count($matLunes);
    	$contMatMartes=count($matMartes);
    	$contMatMiercoles=count($matMiercoles);
    	$contMatJueves=count($matJueves);
    	$contMatViernes=count($matViernes);

    	if($contMatLunes>0){
    		foreach ($matLunes as $materia) {
    		     $dato=explode(' ', $materia);
    		     $dia='Lunes';
    		     $idHorario=Horario::where('horario','=',$dato[1].' - '.$dato[3])->value('id');
    		     $idMateria=Materia::where('nombre','=',$dato[0])->value('id');
    		     $idGrade=Grado::where('name','=',$dato[4].' '.$dato[5])->value('id');

    		     //return ($dia.' '.$idHorario.' '.$idMateria.' '.$idProfesor.' '.$idGrade);
    		     //Verificar que no exista cruce de materias

    		     $clase=new clasesProfesor;
    		     $clase->dia=$dia;
    		     $clase->horario_id=$idHorario;
    		     $clase->profesor_id=$idProfesor;
    		     $clase->materia_id=$idMateria;
    		     $clase->grado_id=$idGrade;

    		     $clase->save();
    		}
    		$salvaLunes=true;
    	}
    	if($contMatMartes>0){
			foreach ($matMartes as $materia) {
    		     $dato=explode(' ', $materia);
    		     $dia='Martes';
    		     $idHorario=Horario::where('horario','=',$dato[1].' - '.$dato[3])->value('id');
    		     $idMateria=Materia::where('nombre','=',$dato[0])->value('id');
    		     $idGrade=Grado::where('name','=',$dato[4].' '.$dato[5])->value('id');

    		     //return ($dia.' '.$idHorario.' '.$idMateria.' '.$idProfesor.' '.$idGrade);
    		     //Verificar que no exista cruce de materias

    		     $clase=new clasesProfesor;
    		     $clase->dia=$dia;
    		     $clase->horario_id=$idHorario;
    		     $clase->profesor_id=$idProfesor;
    		     $clase->materia_id=$idMateria;
    		     $clase->grado_id=$idGrade;

    		     $clase->save();
    		}
    		$salvaMartes=true;
    	}
    	if($contMatMiercoles>0){
    		foreach ($matMiercoles as $materia) {
    		     $dato=explode(' ', $materia);
    		     $dia='Miercoles';
    		     $idHorario=Horario::where('horario','=',$dato[1].' - '.$dato[3])->value('id');
    		     $idMateria=Materia::where('nombre','=',$dato[0])->value('id');
    		     $idGrade=Grado::where('name','=',$dato[4].' '.$dato[5])->value('id');

    		     //return ($dia.' '.$idHorario.' '.$idMateria.' '.$idProfesor.' '.$idGrade);
    		     //Verificar que no exista cruce de materias

    		     $clase=new clasesProfesor;
    		     $clase->dia=$dia;
    		     $clase->horario_id=$idHorario;
    		     $clase->profesor_id=$idProfesor;
    		     $clase->materia_id=$idMateria;
    		     $clase->grado_id=$idGrade;

    		     $clase->save();
    		}
    		$salvaMiercoles=true;
    	}
    	if($contMatJueves>0){
    		foreach ($matJueves as $materia) {
    		     $dato=explode(' ', $materia);
    		     $dia='Jueves';
    		     $idHorario=Horario::where('horario','=',$dato[1].' - '.$dato[3])->value('id');
    		     $idMateria=Materia::where('nombre','=',$dato[0])->value('id');
    		     $idGrade=Grado::where('name','=',$dato[4].' '.$dato[5])->value('id');

    		     //return ($dia.' '.$idHorario.' '.$idMateria.' '.$idProfesor.' '.$idGrade);
    		     //Verificar que no exista cruce de materias

    		     $clase=new clasesProfesor;
    		     $clase->dia=$dia;
    		     $clase->horario_id=$idHorario;
    		     $clase->profesor_id=$idProfesor;
    		     $clase->materia_id=$idMateria;
    		     $clase->grado_id=$idGrade;

    		     $clase->save();
    		}
    		$salvaJueves=true;
    	}	
    	if($contMatViernes>0){
    		foreach ($matViernes as $materia) {
    		     $dato=explode(' ', $materia);
    		     $dia='Viernes';
    		     $idHorario=Horario::where('horario','=',$dato[1].' - '.$dato[3])->value('id');
    		     $idMateria=Materia::where('nombre','=',$dato[0])->value('id');
    		     $idGrade=Grado::where('name','=',$dato[4].' '.$dato[5])->value('id');

    		     //return ($dia.' '.$idHorario.' '.$idMateria.' '.$idProfesor.' '.$idGrade);
    		     //Verificar que no exista cruce de materias

    		     $clase=new clasesProfesor;
    		     $clase->dia=$dia;
    		     $clase->horario_id=$idHorario;
    		     $clase->profesor_id=$idProfesor;
    		     $clase->materia_id=$idMateria;
    		     $clase->grado_id=$idGrade;

    		     $clase->save();
    		}
    		$salvaViernes=true;
    	}

    	if($salvaLunes || $salvaMartes || $salvaMiercoles || $salvaJueves || $salvaViernes){
    		\Session::flash('message',' se han registrado las clases al profesor');
      		return Redirect::to('asignaHorariosProf');
    	}else{
    		\Session::flash('messageAlert',' debe seleccionar al menos una clase para asignar, verifique e intente nuevamente');
      		return Redirect::to('asignaHorariosProf');
    	}	
    }

    public function showClases($id){
    	$asignaciones=DB::select(DB::raw("select * from clasesAsignadas where profesor_id='$id'"));

    	$contarAsignaciones=count($asignaciones);

    	if($contarAsignaciones>0){
    		return view("administracion.asignacionesProfEstu.form_clasesAsignadasProf",compact("asignaciones","id"));
    	}else{
    		/*\Session::flash('messageAlert',' el profesor no tiene horarios asignados, verifique e intente nuevamente');
      		return Redirect::to('asignaHorariosProf');*/
    	}	
    }

    public function editaClasesAsign(Request $request){
    	$idProfesor= Input::get('idProfesor');
    	$matLunes = Input::get('materiasLun'); //Materias lunes seccionadas en la vista
    	$matMartes = Input::get('materiasMar'); 
    	$matMiercoles = Input::get('materiasMier'); 
    	$matJueves = Input::get('materiasJuev');
    	$matViernes = Input::get('materiasVier');

        $date = Carbon::now()->year;
    	$borraLunes=false;
    	$borraMartes=false;
    	$borraMiercoles=false;
    	$borraJueves=false;
    	$borraViernes=false;  

    	$contMatLunes=count($matLunes);
    	$contMatMartes=count($matMartes);
    	$contMatMiercoles=count($matMiercoles);
    	$contMatJueves=count($matJueves);
    	$contMatViernes=count($matViernes);

    	if($contMatLunes>0){
    		foreach ($matLunes as $materia) {
    		     $dato=explode(' ', $materia);
    		     $dia='Lunes';
    		     $idHorario=Horario::where('horario','=',$dato[0].' - '.$dato[2])->value('id');
    		     $idMateria=Materia::where('nombre','=',$dato[5])->value('id');
    		     $idGrade=Grado::where('name','=',$dato[3].' '.$dato[4])->value('id');

    		     $borrarRegistro=DB::select(DB::raw("delete from clases_profesors where dia='$dia' and horario_id='$idHorario' and materia_id='$idMateria' and profesor_id='$idProfesor' and grado_id='$idGrade'"));

                 $borrarRegistroNotas=DB::select(DB::raw("delete from notas
                 where extract(year from created_at) = '$date' and nota_profesor='$idProfesor' and nota_materia='$idMateria' 
                 and (select G.id from estudiantes E join grados G on(E.grado_id=G.id) where E.id=nota_estudiante )='$idGrade'"));
    		}
    		$borraLunes=true;
    	}
    	if($contMatMartes>0){
			foreach ($matMartes as $materia) {
    		     $dato=explode(' ', $materia);
    		     $dia='Martes';
    		     $idHorario=Horario::where('horario','=',$dato[0].' - '.$dato[2])->value('id');
                 $idMateria=Materia::where('nombre','=',$dato[5])->value('id');
    		     $idGrade=Grado::where('name','=',$dato[3].' '.$dato[4])->value('id');

    		     $borrarRegistro=DB::select(DB::raw("delete from clases_profesors where dia='$dia' and horario_id='$idHorario' and materia_id='$idMateria' and profesor_id='$idProfesor' and grado_id='$idGrade'"));

                 $borrarRegistroNotas=DB::select(DB::raw("delete from notas
                 where extract(year from created_at) = '$date' and nota_profesor='$idProfesor' and nota_materia='$idMateria' 
                 and (select G.id from estudiantes E join grados G on(E.grado_id=G.id) where E.id=nota_estudiante )='$idGrade'"));
    		}
    		$borraMartes=true;
    	}
    	if($contMatMiercoles>0){
    		foreach ($matMiercoles as $materia) {
    		     $dato=explode(' ', $materia);
    		     $dia='Miercoles';
    		     $idHorario=Horario::where('horario','=',$dato[0].' - '.$dato[2])->value('id');
    		     $idMateria=Materia::where('nombre','=',$dato[5])->value('id');
    		     $idGrade=Grado::where('name','=',$dato[3].' '.$dato[4])->value('id');

    		     $borrarRegistro=DB::select(DB::raw("delete from clases_profesors where dia='$dia' and horario_id='$idHorario' and materia_id='$idMateria' and profesor_id='$idProfesor' and grado_id='$idGrade'"));

                 $borrarRegistroNotas=DB::select(DB::raw("delete from notas
                 where extract(year from created_at) = '$date' and nota_profesor='$idProfesor' and nota_materia='$idMateria' 
                 and (select G.id from estudiantes E join grados G on(E.grado_id=G.id) where E.id=nota_estudiante )='$idGrade'"));
    		}
    		$borraMiercoles=true;
    	}
    	if($contMatJueves>0){
    		foreach ($matJueves as $materia) {
    		     $dato=explode(' ', $materia);
    		     $dia='Jueves';
    		     $idHorario=Horario::where('horario','=',$dato[0].' - '.$dato[2])->value('id');
    		     $idMateria=Materia::where('nombre','=',$dato[5])->value('id');
    		     $idGrade=Grado::where('name','=',$dato[3].' '.$dato[4])->value('id');

    		     $borrarRegistro=DB::select(DB::raw("delete from clases_profesors where dia='$dia' and horario_id='$idHorario' and materia_id='$idMateria' and profesor_id='$idProfesor' and grado_id='$idGrade'"));

                 $borrarRegistroNotas=DB::select(DB::raw("delete from notas
                 where extract(year from created_at) = '$date' and nota_profesor='$idProfesor' and nota_materia='$idMateria' 
                 and (select G.id from estudiantes E join grados G on(E.grado_id=G.id) where E.id=nota_estudiante )='$idGrade'"));
    		}
    		$borraJueves=true;
    	}	
    	if($contMatViernes>0){
    		foreach ($matViernes as $materia) {
    		     $dato=explode(' ', $materia);
    		     $dia='Viernes';
    		     $idHorario=Horario::where('horario','=',$dato[0].' - '.$dato[2])->value('id');
    		     $idMateria=Materia::where('nombre','=',$dato[5])->value('id');
    		     $idGrade=Grado::where('name','=',$dato[3].' '.$dato[4])->value('id');

    		     $borrarRegistro=DB::select(DB::raw("delete from clases_profesors where dia='$dia' and horario_id='$idHorario' and materia_id='$idMateria' and profesor_id='$idProfesor' and grado_id='$idGrade'"));

                 $borrarRegistroNotas=DB::select(DB::raw("delete from notas
                 where extract(year from created_at) = '$date' and nota_profesor='$idProfesor' and nota_materia='$idMateria' 
                and (select G.id from estudiantes E join grados G on(E.grado_id=G.id) where E.id=nota_estudiante )='$idGrade'"));
    		}
    		$borraViernes=true;
    	}

    	if($borraLunes || $borraMartes || $borraMiercoles || $borraJueves || $borraViernes){
    		\Session::flash('message',' se han eliminado las clases seleccionadas, es necesario que estas sean reasignadas');
      		return Redirect::to('asignaHorariosProf');
    	}else{
    		\Session::flash('messageAlert',' debe seleccionar al menos una clase para eliminar, verifique e intente nuevamente');
      		return Redirect::to('asignaHorariosProf');
    	}
    }

    public function cursoEstudiante(){
    	$estudiantes=User::where('rol','=','Estudiante')->get();
    	$estuMatriculados=Estudiante::get();
    	$cursos=Grado::get();

    	return view('administracion.asignacionesProfEstu.gradoEstudiante',compact('estudiantes','cursos','estuMatriculados'));
    }


    public function guardarCursos(){

    	$datosRegistro=Input::get('data');
    	//return $datosRegistro;
    	if (array_key_exists('datosCurso', $datosRegistro)) {
    		$datosCurso=$datosRegistro['datosCurso'];
    		$contarDatos=count($datosCurso);

    		if($contarDatos>0){
    			for($i=0;$i<$contarDatos;$i++){

		            $datos=explode(" ", $datosCurso[$i]);
		            $idEstudiante=$datos[1];
		            $idCurso=$datos[0];

		            $estudiante=Estudiante::where('user_id','=',$idEstudiante)->first();
		            //return $buscar;
		            if($estudiante){
		            	$estudiante->user_id=$idEstudiante;
		            	$estudiante->grado_id=$idCurso;
		            }else{
		            	$estudiante=new Estudiante;
		            	$estudiante->user_id=$idEstudiante;
		            	$estudiante->grado_id=$idCurso;
		            }

		            if(array_key_exists('estado', $datosRegistro)){
		            	$datosEstados=$datosRegistro['estado'];
	    				$datos=explode(" ", $datosEstados[$i]);
	 					$idEstu=$datos[0];
			            $estado=$datos[1];
			            if($idEstu==$idEstudiante){
			         		$estudiante->estado=$estado;
			            }
		            }
		            if(array_key_exists('acudiente', $datosRegistro)){
		            	$datosAcudiente=$datosRegistro['acudiente'];
		            	$estudiante->acudiente=$datosAcudiente[$i];
		            }
		            if(array_key_exists('mail', $datosRegistro)){
		            	$datosMail=$datosRegistro['mail'];
		            	$mail=$datosMail[$i];
		            	$estudiante->email_acu=$mail;
		            }

		            $estudiante->save();
          		}
    		}
    		//\Session::flash('message',' se han registrado los alumnos al curso correspondiente');
    	}else{
    		//\Session::flash('messageAlert',' se presento un error, verifique e intente nuevamente');
    	}
    	return Redirect::to('asignaCursoEstu');	
    }

    public function findEstudiante(Request $request){
        $dato=$request->buscarDato;

        $estudiantes=DB::select(DB::raw("select * from users where (rol = 'Estudiante')
                            and ( (id::text like '%$dato%')
                            or (UPPER(name) like UPPER('%$dato%'))
                            or (UPPER(last_name) like UPPER('%$dato%')))"));

                    //return $estudiantes;
        $estuMatriculados=Estudiante::get();
        $cursos=Grado::get();

        return view('administracion.asignacionesProfEstu.gradoEstudiante',compact('estudiantes','cursos','estuMatriculados'));
    }

    public function formCargar(){
        return view ('administracion.asignacionesProfEstu.cargadorDeDatos');
    }


    public function cargandoDatos(){ 
        $archivo=Input::file('archivo');
        
        $nombre_original=$archivo->getClientOriginalName();
        $extension=$archivo->getClientOriginalExtension();

        if(!$extension=='xlsx' || !$extension=='xls'){
            return view("mensajes.msj_rechazado")->with("msj","Error archivo invalido");
        }else{        
            $r1=Storage::disk('ArchivosDatos')->put($nombre_original,  \File::get($archivo) );
            $ruta=storage_path('ArchivosDatos') ."\\". $nombre_original;
            
            if($r1){
                Excel::selectSheetsByIndex(0)->load($ruta, function($reader) {
                    $encontrados=$errorCurso=$actualizados=0;
                    $rows = $reader->all()->toArray();

                    foreach($rows as $row) {
                        $idUsuario=(int) $row['doc'];

                        $estudiante = DB::select(DB::raw("select * from users where (id = $idUsuario) and (rol='Estudiante')"));
                        $existeEstu=Estudiante::where('user_id','=',$row['doc'])->first();
                        if($estudiante){
                            $encontrados++;
                            if($existeEstu){
                                $actualizados++;
                                $estudiante=$existeEstu;
                            }else{
                                $estudiante = new Estudiante();
                                $estudiante->user_id= $row['doc'];  
                            }
                        } else {
                             return view("mensajes.msj_rechazado")->with("msj","Se encontraron usuarios no existentes");
                        }
                        $idGrado=Grado::where('name','=',$row['curso'])->value('id');
                        if($idGrado<1){
                            $errorCurso++;
                        }else{
                            $estudiante->grado_id= $idGrado;
                        }
                        // import the data and save to storage
                        $estudiante->estado= $row['estado'];
                        $estudiante->acudiente= $row['acudiente'];
                        $estudiante->email_acu= $row['email'];
                        $estudiante->save();
                    }
                });
                return view("mensajes.msj_correcto")->with("msj",' Se han actualizado los datos sobre los estudiantes');
            }else{
                return view("mensajes.msj_rechazado")->with("msj",' error al cargar archivo, verifique e intente nuevamente');    
            }  
        }
    }
}
