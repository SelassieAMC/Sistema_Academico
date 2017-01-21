<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\User;
use App\Estudiante;
use App\Grado;
use App\Materia;
use App\Salon;
use App\rel_grado_salon;
use Mail;
use Storage;

class RectorController extends Controller
{
    public function horarioDocentes(){ 
    	$profesores=DB::select(DB::raw("select distinct doc,name,last_name from profesormateria"));
    	return view('rector.asignacionesProfEstu.clasDocente',compact('profesores'));
    }

    public function mostrarHorarioProfesor($id){
    	$asignaciones=DB::select(DB::raw("select * from clasesAsignadas where profesor_id='$id'"));

    	$contarAsignaciones=count($asignaciones);

    	if($contarAsignaciones>0){
    		return view("rector.asignacionesProfEstu.form_clasesAsignadasProf",compact("asignaciones","id"));
    	}else{

    	}	
    }

    public function estadosEstudiantes(){
        $estudiantes=User::where('rol','=','Estudiante')->get();
        $estuMatriculados=Estudiante::get();
        $cursos=Grado::get();

        return view('rector.asignacionesProfEstu.gradoEstudiante',compact('estudiantes','cursos','estuMatriculados'));
    }

    public function lista_usuarios(){
        $usuarios= User::select()->get();
        return view('rector.usuarios.lista_usuarios')->with("usuarios", $usuarios );
    }

    public function buscausuario($dato=""){
        $usuarios= User::Busqueda($dato);  
        return view('rector.usuarios.lista_usuarios')->with("usuarios", $usuarios );
    }

    public function crearCorreo(){
        return view("rector.correo.form_mail");
    }

    public function enviarCorreo(Request $request){
    
        $pathToFile="";
        $containfile=false; 
        if($request->hasFile('file') ){
            $containfile=true;
            $file = $request->file('file');
            $nombre=$file->getClientOriginalName();
            $pathToFile= storage_path('mails') ."/". $nombre;
            }

        $destinatario=$request->input("destinatario");
        $asunto=$request->input("asunto");
        $contenido=$request->input("contenido_mail");

        $data = array('contenido' => $contenido);
        $r= Mail::send('rector.correo.plantilla_correo', $data, function ($message) use ($asunto,$destinatario,  $containfile,$pathToFile) {
        $message->from('academicocolrafaelcarrasquilla@gmail.com', 'Academico Colegio Rafael Maria Carrasquilla');
        $message->to($destinatario)->subject($asunto);
        if($containfile){
            $message->attach($pathToFile);
            }
        });
        
        if($r){   
            if($containfile){ Storage::disk('mailFile')->delete($nombre); }        
                return view("mensajes.msj_correcto")->with("msj","Correo Enviado correctamente");   
            }
        else{            
            return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  
            }
    }

    public function storeCorreo(Request $request){

        if($request->hasFile('file') ){ 
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $nombre=$file->getClientOriginalName();
            $r= Storage::disk('mailFile')->put($nombre,  \File::get($file));
       

            } 
        else{
            return "no";
            } 

        if($r){
            return $nombre ;
            }
        else{
            return "error vuelva a intentarlo";
            }
    }

    public function showMaterias(){
        $materias=Materia::get();
        return view ('rector.materias.listaMaterias', compact('materias'));
    }

    public function showProfesoresAsignadosMaterias(){
        $materias=DB::table('rel_materia_profesors')
            ->join('materias','rel_materia_profesors.materia_id','=','materias.id')
            ->join('users','rel_materia_profesors.profesor_id','=','users.id')
            ->select('rel_materia_profesors.id','materias.nombre','materias.descripcion','materias.intensidadhor','users.id as doc','users.name','users.last_name')->orderBy('users.name')
            ->get();

      return view ('rector.materias.profeXMateria', compact('materias'));
    }

    public function showCursos(){
        $cursos=DB::table('users')->join('grados','users.id','=','grados.director_id')->select('grados.id','grados.name as grado','users.name','users.last_name')->get();

        return view ('rector.cursos.listarGrado', compact('cursos'));
    }

    public function showHorariosCursos(){

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

      return view ('rector.cursos.horario', compact('horarios','cursosConRelacion'));
    }

    public function showAulas(){
        $salones= Salon::paginate(10);
        return view('rector.aulas.listar',compact("salones"));
    }

    public function consulSalonesAsignados(){
        $asignaciones=rel_grado_salon::join('grados','rel_grado_salons.grado_id','=','grados.id')
                                  ->join('salons', 'rel_grado_salons.salon_id','=','salons.id')
                                  ->select('rel_grado_salons.id','grados.name','salons.id as salonid','salons.ubicacion')->get();

      
      return view('rector.aulas.asignaciones',compact("asignaciones"));
    }

    public function CorreosInstitucionales(){
        $directores = DB::select(DB::raw("select * from correosinstitucionales"));
        return view ('rector.correo.CorreosInstitucionales', compact('directores'));
    }
	
	 public function mailsPadres(){
        $listaCursos=Grado::get();
       return view ('rector.correo.correosPadres', compact ('listaCursos')); 
    }

    public function Historia(){
      return View('rector.Servicios.Historia');
    }



    public function ValoresInst(){
      return View('rector.Servicios.Valores');
    }

    public function Himno(){
      return View('rector.Servicios.Himno');
    }
}
