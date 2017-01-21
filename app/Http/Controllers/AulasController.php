<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Salon;
use App\Grado;
use App\rel_grado_salon;
use App\Http\Requests;
use Session;
use Redirect;
use Storage;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;

class AulasController extends Controller
{
    
	public function index(){
		return view ('administracion.aulas.crearAula');
	}


    public function create(Request $request){
		$salon= new Salon;
		$salon->id= $request->input('numero');
		$buscarSalon=Salon::find($salon->id);
		if($buscarSalon){ //Validando la existencia del aula que se intenta crear
			\Session::flash('messageAlert',' El salon que intenta crear ya existe, por favor verifique');
            return view("administracion.aulas.crearAula");  
		}
		$salon->ubicacion= $request->input('ubicacion');
		$salon->descripcion= $request->input('descripcion');

		$imagen = $request->file('imagen');

		if($imagen){
          $inputIma  = array('image' => $imagen);
          $reglasIma = array('image' => 'image|mimes:jpeg,jpg,bmp,png,gif');
          $validacionIma = Validator::make($inputIma,  $reglasIma);
          if ($validacionIma->fails()){ //Validando cargue solo de imagenes
              \Session::flash('messageAlert',' Archivo de imagen invalido');
              return $this->index($idPub);
          }
          $nombreIma = $imagen->getClientOriginalName();
          $extensionIma=$imagen->getClientOriginalExtension();
          $nuevo_nombreIma=$salon->ubicacion.".".$extensionIma;
          $r1=Storage::disk('fotoAulas')->put($nuevo_nombreIma,  \File::get($imagen)); // guardando imagen
          $rutadelaimagen="../storage/fotoAulas/".$nuevo_nombreIma;
      	}

      	if($imagen){
				  $salon->foto= $rutadelaimagen;}
		
		$resul= $salon->save();

		if($resul){
			\Session::flash('message',' Salon creado');
            return view("administracion.aulas.crearAula");  
		}
		else{            
            \Session::flash('messageAlert',' Error en la creacion, intente de nuevo');  
		}
    }

    public function show(){
    	$salones= Salon::paginate(10);
        return view('administracion.aulas.listar',compact("salones"));
    }

    public function edit($id){

      $salon=Salon::find($id);
      $contador=count($salon);
      if($contador>0){          
            return view("administracion.aulas.editarAula",compact('salon'));   
      }else{
      		\Session::flash('messageAlert','El aula seleccionada no existe');            
      }
    }

    public function update(Request $request,$id){

      $data=$request->all();
      $salon=Salon::find($id);
      $descripcion=$request->input('descripcion');
      $ubicacion=$request->input('ubicacion');

      $imagen = $request->file('foto');
      if($imagen){
          $inputIma  = array('image' => $imagen);
          $reglasIma = array('image' => 'image|mimes:jpeg,jpg,bmp,png,gif');
          $validacionIma = Validator::make($inputIma,  $reglasIma);
          if ($validacionIma->fails()){ //Validando cargue solo de imagenes
              \Session::flash('messageAlert',' Archivo de imagen invalido');
              return view("administracion.aulas.editarAula",compact('salon'));
          }
          $nombreIma = $imagen->getClientOriginalName();
          $extensionIma=$imagen->getClientOriginalExtension();
          $nuevo_nombreIma=$ubicacion.".".$extensionIma;
          $r1=Storage::disk('fotoAulas')->put($nuevo_nombreIma,  \File::get($imagen)); // guardando imagen
          $rutadelaimagen="../storage/fotoAulas/".$nuevo_nombreIma;
      }

      $salon->descripcion= $descripcion;
      $salon->ubicacion=$ubicacion;
      if($imagen){
          $salon->foto= $rutadelaimagen;}
             
      $resul= $salon->save();
      \Session::flash('message',' Informacion de aula de clase actualizada');
      return Redirect::to('listaAulas');
  }

      public function find(Request $request){
      $dato=$request->buscarDato;
      $salones = DB::select(DB::raw("select * from salons where UPPER(ubicacion) like UPPER('%$dato%') 
                or UPPER(descripcion) like UPPER('%$dato%')"));

      return view('administracion.aulas.listar',compact("salones"));
    } 

    public function asignarCurso(){
      //Mostrar registros que no tienen relaciones completas
      
        $cursos=Grado::whereNotExists(function ($query){
                            $query->select('*')
                                  ->from('rel_grado_salons')
                     ->whereRaw('rel_grado_salons.grado_id = grados.id');
        })->get();  
      //$cursos=Grado::get();
      $aulas=Salon::get();
        //return $cursos;

      return view('administracion.aulas.relacionarGrado',compact("cursos","aulas"));
    }

    public function asignarAula(Request $request){
        $cursos = Input::get('cursos');
        $aula = Input::get('aula');

        $numCursos=count($cursos); //Numeero de cursos seleccionados
        $numAula=count($aula); //Numero de aulas seleccionadas
        //return $numCursos.' '.$numAulas;
        if($numAula and $numCursos){
          $idAula=Salon::where('ubicacion','=',$aula)->value('id'); //Buscando el id del salon que se intenta relacionar con los cursos
          $buscarRels=rel_grado_salon::where('salon_id','=',$idAula)->get(); //Buscando numero de posibles relaciones existentes
          $numRels=count($buscarRels); //Contando la cantidad de relaciones existentes
          
          if($numCursos==2){
            foreach ($cursos as $curso) {
              $idCurso=Grado::where('name','=',$curso)->value('id');
              $buscarRelCurso=rel_grado_salon::where('grado_id','=',$idCurso)->get();
              $numRelCurso=count($buscarRelCurso);
              if($numRelCurso){
                \Session::flash('messageAlert',' uno o varios de los cursos ya tiene un salon asignado, verifique e intente nuevamente');
                Return Redirect::to('asignaCurso');
              }
            }
          }else if($numCursos==1){
            $idCurso=Grado::where('name','=',$cursos)->value('id');
            $buscarRelCurso=rel_grado_salon::where('grado_id','=',$idCurso)->get();
            $numRelCurso=count($buscarRelCurso);
            if($numRelCurso){
              \Session::flash('messageAlert',' uno o varios de los cursos ya tiene un salon asignado, verifique e intente nuevamente');
              Return Redirect::to('asignaCurso');
            }
          }

          switch($numRels){
            case 0:
                    if($numCursos==2){
                      foreach ($cursos as $curso) {
                        $idCurso=Grado::where('name','=',$curso)->value('id');
                        $relCursoAula=new rel_grado_salon;
                        $relCursoAula->grado_id=$idCurso;
                        $relCursoAula->salon_id=$idAula;
                        $relCursoAula->save();
                      }
                      \Session::flash('message',' asignando dos cursos a un salon');
                      Return Redirect::to('asignaCurso');
                    }else if($numCursos==1){
                      $idCurso=Grado::where('name','=',$cursos)->value('id');
                      $relCursoAula=new rel_grado_salon;
                      $relCursoAula->grado_id=$idCurso;
                      $relCursoAula->salon_id=$idAula;
                      $relCursoAula->save();

                      \Session::flash('message',' asignando un curso a un salon');
                      Return Redirect::to('asignaCurso');
                    }else if($numCursos>2){
                      \Session::flash('messageAlert',' no puede asignar mas de dos cursos en un salon, verifique e intente nuevamente');
                      Return Redirect::to('asignaCurso');
                    }
                    break;
            case 1:
                   if($numCursos==1 || $numCursos==0){
                      $idCurso=Grado::where('name','=',$cursos)->value('id');
                      $relCursoAula=new rel_grado_salon;
                      $relCursoAula->grado_id=$idCurso;
                      $relCursoAula->salon_id=$idAula;
                      $relCursoAula->save();

                      \Session::flash('message',' asignando un curso a un salon');
                      Return Redirect::to('asignaCurso');
                    }else if($numCursos>1){
                      \Session::flash('messageAlert',' no puede asignar mas de dos cursos en un salon, verifique e intente nuevamente');
                      Return Redirect::to('asignaCurso');
                    }
                    break;
            case 2: 
                    \Session::flash('messageAlert',' no puede asignar mas de dos cursos en un salon, verifique e intente nuevamente');
                    Return Redirect::to('asignaCurso');
                    break;

            default:
                    \Session::flash('messageAlert',' error en la consulta, verifique e intente nuevamente');
                    Return Redirect::to('asignaCurso');
                    break;
          }      
        }else{
          \Session::flash('messageAlert',' debe seleccionar al menos un salon y un curso, verifique e intente nuevamente');
            Return Redirect::to('asignaCurso');
        }
    }

    public function consulAsigna(){
      $asignaciones=rel_grado_salon::join('grados','rel_grado_salons.grado_id','=','grados.id')
                                  ->join('salons', 'rel_grado_salons.salon_id','=','salons.id')
                                  ->select('rel_grado_salons.id','grados.name','salons.id as salonid','salons.ubicacion')->get();

      
      return view('administracion.aulas.asignaciones',compact("asignaciones"));
    }

    public function delete(Request $request, $id){
      $deleteRel=rel_grado_salon::find($id);

      rel_grado_salon::destroy($id);

      \Session::flash('message',' se ha eliminado la asignacion seleccionada'); 
      Return Redirect::to('consultaAsignaciones');
    }

    public function findRelation(Request $request){
      $dato=$request->buscarDato;
      $asignaciones = DB::select(DB::raw("select * from salonDeCursos where UPPER(name) like UPPER('%$dato%') 
                or UPPER(ubicacion) like UPPER('%$dato%')"));

      return view('administracion.aulas.asignaciones',compact("asignaciones"));
    } 

    public function deleteAula($id){
      Salon::destroy($id);

      \Session::flash('message',' se ha eliminado el aula'); 
      Return Redirect::to('consultaAsignaciones');
    }
}
