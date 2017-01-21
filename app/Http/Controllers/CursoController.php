<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Salon;
use App\Grado;
use App\Materia;
use App\Horario;
use App\HorMatCurso;
use Illuminate\Support\Facades\Input;
use App\User;
use DB;
use Session;
use Redirect;
use Illuminate\Pagination\Paginator;

class CursoController extends Controller
{
	public function index(){
		$dataSalon=DB::raw("CONCAT(id,' ',ubicacion) as salon"); //Datos que queremos concatenar y enviar
		$salones=DB::table('salons')->lists($dataSalon);	//Consulta que devuelve los salones creados
		$fullNameDirector = DB::raw("CONCAT(id,' ',name, ' ', last_name) as fullname"); //Concatenamos documeto y nombre de directores
		$directores= DB::table('users')->where('rol','=','Director')->lists($fullNameDirector); //consultamos usuarios que sean drectores y los enviamos
		return view ('administracion.cursos.crearGrado',compact('salones','directores')); //devolvemos la vista y enviamos parametros obtenidos en las consultas
	}


 	public function create(Request $request){
 		$data=$request->all();
 		$idDirector=explode(' ', $request->input('director'));
 		$idSalon=explode(' ', $request->input('salon'));
		$grado= new Grado;
		$grado->name= $data["curso"];
		$grado->director_id=$idDirector[0];

		$resul= $grado->save();

		if($resul){
			\Session::flash('message',' curso creado');
              return $this->index();
          }
		else{            
            \Session::flash('messageAlert',' Error en la creacion, intente nuevamente');
              return view("administracion.home");
          }  
	}

	public function show(){
    //select grados.id, grados.name as grado,users.name,users.last_name,grados.salon_id from users, grados where users.id =grados.director_id

      $cursos=DB::table('users')->join('grados','users.id','=','grados.director_id')->select('grados.id','grados.name as grado','users.name','users.last_name')->get();

      return view ('administracion.cursos.listarGrado', compact('cursos'));
    }

    public function editar($id){
      $cursos=DB::table('users')->join('grados','users.id','=','grados.director_id')->select('grados.id','grados.name as grado','users.name','users.last_name')->get();

      $dataSalon=DB::raw("CONCAT(id,' ',ubicacion) as salon"); //Datos que queremos concatenar y enviar
	  $salones=DB::table('salons')->lists($dataSalon);	//Consulta que devuelve los salones creados
	  $fullNameDirector = DB::raw("CONCAT(id,' ',name, ' ', last_name) as fullname"); //Concatenamos documeto y nombre de directores
	  $directores= DB::table('users')->where('rol','=','Director')->lists($fullNameDirector); //consultamos usuarios que sean drectores y los enviamos

      $curso=Grado::find($id);
      $contador=count($curso);
      if($contador>0){          
            return view("administracion.cursos.editarGrado",compact('curso','salones','directores'));   
      }else{
      	    \Session::flash('messageAlert',' Curso no encontrado, verifique nuevamente');
            return view('administracion.cursos.listarGrado',compact('cursos'));            
      }
    }
    public function delete($id){
      
      Grado::destroy($id);

      \Session::flash('message',' El curso se ha eliminado');
      return $this->show();           
    }

    public function update(Request $request,$id){

      $curso=Grado::find($id);
      $idDirector=explode(' ', $request->input('director'));

      $name=$request->input('nombre');
      $director=$idDirector[0];

      $curso->name= $name;
      $curso->director_id=$director;
             
      $resul= $curso->save();
      \Session::flash('message',' informacion de curso actualizada');
      return Redirect::to('listaCursos');
  	} 

    public function find(Request $request){
      $dato=$request->buscarDato;
      //select * from directorCurso where UPPER(campo) like UPPER('%$dato%')

      $cursos=DB::select(DB::raw("select * from directorCurso where UPPER(name) like UPPER('%$dato%') 
                        or UPPER(last_name) like UPPER('%$dato%')
                        or UPPER(grado) like UPPER('%$dato%')"));

      return view ('administracion.cursos.listarGrado', compact('cursos'));
    } 

    public function asignMatHor(){
      
      $cursos=DB::table('grados')
            ->whereNotExists(function ($query){
                $query->select('*')
                     ->from('hor_mat_cursos')
                     ->whereRaw('hor_mat_cursos.curso_id = grados.id');
            })->get();

      $materias=Materia::get();
      $horarios=Horario::orderBy('id')->get();

      return view ('administracion.cursos.materiasXCursoYHorario', compact('cursos','materias','horarios'));
    }

    public function regisHorario(){
     //return "hola desde controlador ";
      $schedule=Input::get('hor');
      //$arrayHorarios=json_encode($schedule);
      if (array_key_exists('Lunes', $schedule)) {
        $lunes=$schedule['Lunes']; //guardamos el arreglo del dia en una variable
        $numHorLunes=count($schedule['Lunes']); //contamos los datos del arreglo

        if($numHorLunes){
          for($i=0;$i<$numHorLunes;$i++){
            $datos=explode(" ", $lunes[$i]);
            $idMateria=$datos[0];
            $idHorario=$datos[1];
            $idCurso=$datos[2];
            $horario=new HorMatCurso;
            $horario->dia='Lunes';
            $horario->horario_id=$idHorario;
            $horario->materia_id=$idMateria;
            $horario->curso_id=$idCurso;

            $horario->save();
          }
        }
      }

      if (array_key_exists('Martes', $schedule)) {
        $martes=$schedule['Martes']; //guardamos el arreglo del dia en una variable
        $numHorMartes=count($schedule['Martes']); //contamos los datos del arreglo

        if($numHorMartes){
          for($i=0;$i<$numHorMartes;$i++){
            $datos=explode(" ", $martes[$i]);
            $idMateria=$datos[0];
            $idHorario=$datos[1];
            $idCurso=$datos[2];
            $horario=new HorMatCurso;
            $horario->dia='Martes';
            $horario->horario_id=$idHorario;
            $horario->materia_id=$idMateria;
            $horario->curso_id=$idCurso;

            $horario->save();
          }
        }
      }

      if (array_key_exists('Miercoles', $schedule)) {
        $miercoles=$schedule['Miercoles']; //guardamos el arreglo del dia en una variable
        $numHorMiercoles=count($schedule['Miercoles']); //contamos los datos del arreglo

        if($numHorMiercoles){
          for($i=0;$i<$numHorMiercoles;$i++){
            $datos=explode(" ", $miercoles[$i]);
            $idMateria=$datos[0];
            $idHorario=$datos[1];
            $idCurso=$datos[2];
            $horario=new HorMatCurso;
            $horario->dia='Miercoles';
            $horario->horario_id=$idHorario;
            $horario->materia_id=$idMateria;
            $horario->curso_id=$idCurso;

            $horario->save();
          }
        }
      }

      if (array_key_exists('Jueves', $schedule)) {
        $jueves=$schedule['Jueves']; //guardamos el arreglo del dia en una variable
        $numHorJueves=count($schedule['Jueves']); //contamos los datos del arreglo

        if($numHorJueves){
          for($i=0;$i<$numHorJueves;$i++){
            $datos=explode(" ", $jueves[$i]);
            $idMateria=$datos[0];
            $idHorario=$datos[1];
            $idCurso=$datos[2];
            $horario=new HorMatCurso;
            $horario->dia='Jueves';
            $horario->horario_id=$idHorario;
            $horario->materia_id=$idMateria;
            $horario->curso_id=$idCurso;

            $horario->save();
          }
        }
      }

      if (array_key_exists('Viernes', $schedule)) {
        $viernes=$schedule['Viernes']; //guardamos el arreglo del dia en una variable
        $numHorViernes=count($schedule['Viernes']); //contamos los datos del arreglo

        if($numHorViernes){
          for($i=0;$i<$numHorViernes;$i++){
            $datos=explode(" ", $viernes[$i]);
            $idMateria=$datos[0];
            $idHorario=$datos[1];
            $idCurso=$datos[2];
            $horario=new HorMatCurso;
            $horario->dia='Viernes';
            $horario->horario_id=$idHorario;
            $horario->materia_id=$idMateria;
            $horario->curso_id=$idCurso;

            $horario->save();
          }
        } 
      }
    }

    public function horarioXCurso(){

        $horarios=DB::select(DB::raw("select horarios.horario,
         max(case when hor_mat_cursos.dia = 'Lunes' then materias.nombre end) as Lunes,
         max(case when hor_mat_cursos.dia = 'Martes' then materias.nombre end) as Martes,
         max(case when hor_mat_cursos.dia = 'Miercoles' then materias.nombre end) as Miercoles,
         max(case when hor_mat_cursos.dia = 'Jueves' then materias.nombre end) as Jueves,
         max(case when hor_mat_cursos.dia = 'Viernes' then materias.nombre end) as Viernes,
         grados.name
        from hor_mat_cursos inner join materias on (hor_mat_cursos.materia_id=materias.id) 
        inner join grados on (hor_mat_cursos.curso_id=grados.id) 
        inner join horarios on (hor_mat_cursos.horario_id=horarios.id) 

        group by horario,grados.name
        order by horario"));

      //return $horarios;
      $cursosConRelacion=DB::select(DB::raw("select distinct hor_mat_cursos.curso_id,grados.name from hor_mat_cursos inner join grados on(hor_mat_cursos.curso_id=grados.id)"));

      return view ('administracion.cursos.horario', compact('horarios','cursosConRelacion'));
    }

    public function deleteHorario($id){
      $horariosEliminar=HorMatCurso::where('curso_id','=',$id)->get();

      foreach ($horariosEliminar as $horario) {
        $horario->delete();
      }

      \Session::flash('message',' Horario eliminado');
      return Redirect::to('consultHorarios');
      
    }

    public function findHorario(Request $request){
      $dato=$request->buscarDato;
      //select * from directorCurso where UPPER(campo) like UPPER('%$dato%')

      $horarios=DB::select(DB::raw("select * from HorarioXcurso where UPPER(name) like UPPER('%$dato%') 
                        or UPPER(lunes) like UPPER('%$dato%')
                        or UPPER(martes) like UPPER('%$dato%')
                        or UPPER(miercoles) like UPPER('%$dato%')
                        or UPPER(jueves) like UPPER('%$dato%')
                        or UPPER(viernes) like UPPER('%$dato%')"));

      $cursosConRelacion=DB::select(DB::raw("select distinct hor_mat_cursos.curso_id,grados.name from hor_mat_cursos inner join grados on(hor_mat_cursos.curso_id=grados.id)"));

      return view ('administracion.cursos.horario', compact('horarios','cursosConRelacion'));
    } 
}