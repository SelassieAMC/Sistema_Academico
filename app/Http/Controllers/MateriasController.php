<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Materia;
use App\User;
use App\Grado;
use App\Rel_materia_profesor;
use DB;
use Illuminate\Support\Facades\Input;



class MateriasController extends Controller
{
    public function index(){

    	$fullNameProfesor = DB::raw("CONCAT(id,'&#9; - ',name, ' ', last_name) as fullname");

    	$profesores=DB::table('users')->where('rol','=','Director')->orWhere('rol','=','Profesor')->lists($fullNameProfesor);
    	$cursos=DB::table('grados')->lists('name');
    	return view('administracion.materias.crearMateria',compact('cursos','profesores'));
    }

    public function create(Request $request){
 		$profesores = Input::get('profesor'); //Profesores seleccionados en la vista
    
    $materia= new Materia;
    $materia->nombre=Input::get('nombre');
    $materia->intensidadhor=Input::get('intensidad');
    $materia->descripcion=Input::get('descripcion');
    $resul= $materia->save();

    if($profesores){
		  foreach ($profesores as $profesor){
  			$idProfesor=explode(' ', $profesor);
   			$idProfesores[]=DB::table('users')->where('id','=',$idProfesor[0])->value('id');
   		}

      $idMateria=DB::table('materias')->where('nombre','=',$materia->nombre)->where('descripcion','=', $materia->descripcion)->value('id');
    
      foreach ($idProfesores as $idProfesor) {
        $buscRelacion=DB::table('rel_materia_profesors')->where('materia_id','=',$idMateria)->where('profesor_id','=',$idProfesor)->get();//Buscando relaciones existentes 

        if($buscRelacion){
                    return $buscRelacion;
          //Si existe la relacion no se crea de nuevo de lo contrario creeela
          \Session::flash('messageAlert',' una o varias de las relaciones que intenta crear ya existe, verifique e intente nuevamente');
              return $this->index();
        }else{
        $relacion= new Rel_materia_profesor;
        $relacion->profesor_id=$idProfesor;
        $relacion->materia_id=$idMateria;
        $resul2=$relacion->save();
        }
      } 		
    }
 		

		if($resul){
			       \Session::flash('message',' materia creada');
              return $this->index();
    }
    else{
      \Session::flash('messageAlert',' Error en la creacion, intente nuevamente');
       return view("administracion.home");
    }  
	}

	   public function show(){
      
      $materias=Materia::get();
        
      return view ('administracion.materias.listaMaterias', compact('materias'));
    }

    public function editar($id){
      $materias=DB::table('rel_materia_profesors')
            ->join('materias','rel_materia_profesors.materia_id','=','materias.id')
            ->join('users','rel_materia_profesors.profesor_id','=','users.id')
            ->select('materias.id','materias.nombre','materias.descripcion','materias.intensidadhor','users.name','users.last_name','rel_materia_profesors.id as relacion')->get();
      $fullNameProfesor = DB::raw("CONCAT(id,'&#9; - ',name, ' ', last_name) as fullname");

      $profesores=DB::table('users')
      ->where('rol','=','Director')
      ->orWhere('rol','=','Profesor')
      ->lists($fullNameProfesor);

      $materia=Materia::find($id);

        $idMat=0;
        $idPro=0;
        $idRel=0;

      $contador=count($materia);
      if($contador>0){          
            return view("administracion.materias.editarMateria",compact('materia','profesores','idMat','idPro','idRel'));   
      }else{
            \Session::flash('messageAlert',' Materia no encontrada, verifique nuevamente');
            return view('administracion.materias.listaMaterias',compact('materias'));            
      }
    }

    public function update(Request $request,$id,$rel){
        $profesores = Input::get('profesor'); //Profesores seleccionados en la vista

        $materia= Materia::find($id);

        $materia->nombre=Input::get('nombre');
        $materia->intensidadhor=Input::get('intensidad');
        $materia->descripcion=Input::get('descripcion');
        $resul= $materia->save();

        $idMateria=$id;

        if($profesores){
            foreach ($profesores as $profesor){
                $idProfesor=explode(' ', $profesor);
                $idProfesores[]=DB::table('users')->where('id','=',$idProfesor[0])->value('id');
            }

            foreach ($idProfesores as $idProfesor) {
              $buscRelacion=DB::table('rel_materia_profesors')->where('materia_id','=',$idMateria)->where('profesor_id','=',$idProfesor)->get();//Buscando relaciones existentes 

              if($buscRelacion){
                //Si existe la relacion envie el mensaje de error
                \Session::flash('messageAlert',' una o varias de las relaciones que intenta crear ya existe, verifique e intente nuevamente');
                    return $this->show();
              }else{
                $relacion= new Rel_materia_profesor;
                $relacion->profesor_id=$idProfesor;
                $relacion->materia_id=$idMateria;
                $resul2=$relacion->save();
              }
            }
            if($resul and $resul2){
                \Session::flash('message',' materia y profesor actualizado');
                return $this->show();
            }
        }else{
            if($rel!=0){
                $resul3=Rel_materia_profesor::destroy($rel);
                if($resul and $resul3){
                    \Session::flash('message',' se desasigno profesor y se actualizo la materia');
                    return $this->show();
                }
            }
            \Session::flash('message',' se actualizo materia');
            return $this->show();
        }  
    }

     public function find(Request $request){
      $dato=$request->buscarDato;

      $materias=DB::select(DB::raw("select * from materias where UPPER(nombre) like UPPER('%$dato%') 
                        or UPPER(descripcion) like UPPER('%$dato%')"));


      return view ('administracion.materias.listaMaterias', compact('materias'));
    } 

    public function delete($id){

        Materia::destroy($id);
        \Session::flash('message',' Materia eliminada con exito');
        return $this->show();
      
    }

    public function showRelations(){
      //select materias.id,materias.nombre,materias.descripcion,'materias.intensidadHor',users.id as doc,users.name,users.last_name from users,materias,rel_materia_profesors where rel_materia_profesors.materia_id=materias.id and rel_materia_profesors.profesor_id=users.id

      $materias=DB::table('rel_materia_profesors')
            ->join('materias','rel_materia_profesors.materia_id','=','materias.id')
            ->join('users','rel_materia_profesors.profesor_id','=','users.id')
            ->select('rel_materia_profesors.id','materias.nombre','materias.descripcion','materias.intensidadhor','users.id as doc','users.name','users.last_name')->orderBy('users.name')
            ->get();

      return view ('administracion.materias.profeXMateria', compact('materias'));
    }

    public function deleteRelation($id){

        Rel_materia_profesor::destroy($id);

        \Session::flash('message',' Asignacion eliminada con exito');
        return $this->showRelations();
    }

    public function findRelations(Request $request){
      $dato=$request->buscarDato;

      $materias=DB::select(DB::raw("select * from profesorMateria where UPPER(nombre) like UPPER('%$dato%') 
                        or UPPER(descripcion) like UPPER('%$dato%')
                        or UPPER(name) like UPPER('%$dato%')
                         or UPPER(last_name) like UPPER('%$dato%')"));


      return view ('administracion.materias.profeXMateria', compact('materias'));
    }
}
