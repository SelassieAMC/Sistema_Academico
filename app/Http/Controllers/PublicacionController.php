<?php namespace App\Http\Controllers;

use App\User;
use App\Publicacion;
use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Session;
use Redirect;
use DB;

class PublicacionController extends Controller
{
	//Funcion para direccionar al formulario de creacion
    public function index($id){

    	$usuario = User::find($id);
    	return view('administracion.publicaciones.publicar', compact('usuario'));
    }

    public function editar($id){

      $publicacion=Publicacion::find($id);
      $contador=count($publicacion);
      if($contador>0){          
            return view("administracion.publicaciones.editarPublicacion",compact('publicacion'));   
      }else{            
            return view("mensajes.msj_rechazado")->with("msj","La publicacion con ese id no existe o fue borrado");  
      }
    }

    public function update(Request $request,$id){

      $data=$request->all();
      $publicacion=Publicacion::find($id);
      $title=$request->input('titulo');
      $descripcion=$request->input('descripcion');
      $seccion=$request->input('seccion');

      $imagen = $request->file('pathImagen');
      if($imagen){
          $inputIma  = array('image' => $imagen);
          $reglasIma = array('image' => 'image|mimes:jpeg,jpg,bmp,png,gif');
          $validacionIma = Validator::make($inputIma,  $reglasIma);
          if ($validacionIma->fails()){ //Validando cargue solo de imagenes
              \Session::flash('messageAlert',' Archivo de imagen invalido');
              return view("administracion.publicaciones.editarPublicacion",compact('publicacion'));
          }
          $nombreIma = $imagen->getClientOriginalName();
          $extensionIma=$imagen->getClientOriginalExtension();
          $nuevo_nombreIma=$title.".".$extensionIma;
          $r1=Storage::disk('publicaciones')->put($nuevo_nombreIma,  \File::get($imagen)); // guardando imagen
          $rutadelaimagen="../storage/publicaciones/".$nuevo_nombreIma;
      }

      $pdf = $request->file('pathPDF');
      if($pdf){
          $extensionPdf=$pdf->getClientOriginalExtension();
       
          if ($extensionPdf != 'pdf'){// Validando cargue solo de documentos PDF
              \Session::flash('messageAlert',' Archivo PDF invalido');
              return view("administracion.publicaciones.editarPublicacion",compact('publicacion'));
          }
          $nombre_pdf=$pdf->getClientOriginalName();
          $nuevo_nombrePdf=$title.".".$extensionPdf;
          $r2=Storage::disk('publicaciones')->put($nuevo_nombrePdf,  \File::get($pdf)); //guardando pdf
          $rutadepdf="../storage/publicaciones/".$nuevo_nombrePdf;
      }

    //$publicacion->user_id= $idPub;
      $publicacion->titulo= $title;
      $publicacion->descripcion=$descripcion;
      $publicacion->seccion=$seccion;
      if($imagen){
          $publicacion->pathImagen= $rutadelaimagen;}
      if($pdf){
          $publicacion->pathPDF=$rutadepdf;}
             
      $resul= $publicacion->save();
      \Session::flash('message',' Publicacion Actualizada');
      return Redirect::to('listar_pubs');
  }

	  public function store(Request $request){

      $idPub=$request->input('id_publicador');
      $title=$request->input('titulo');
      $descripcion=$request->input('descripcion');
      $seccion=$request->input('seccion');
		//obtenemos el campo file definido en el formulario

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
          $nuevo_nombreIma=$title.".".$extensionIma;
          $r1=Storage::disk('publicaciones')->put($nuevo_nombreIma,  \File::get($imagen)); // guardando imagen
          $rutadelaimagen="../storage/publicaciones/".$nuevo_nombreIma;
      }

      $pdf = $request->file('pdf');
      if($pdf){
          $extensionPdf=$pdf->getClientOriginalExtension();
       
          if ($extensionPdf != 'pdf'){// Validando cargue solo de documentos PDF
              \Session::flash('messageAlert',' Archivo PDF invalido');
              return $this->index($idPub);
          }
          $nombre_pdf=$pdf->getClientOriginalName();
          $nuevo_nombrePdf=$title.".".$extensionPdf;
          $r2=Storage::disk('publicaciones')->put($nuevo_nombrePdf,  \File::get($pdf)); //guardando pdf
          $rutadepdf="../storage/publicaciones/".$nuevo_nombrePdf;
      }

			$publicacion= new Publicacion;
			$publicacion->user_id= $idPub;
			$publicacion->titulo= $title;
      $publicacion->seccion= $seccion;
      $publicacion->descripcion=$descripcion;
      if($imagen){
				  $publicacion->pathImagen= $rutadelaimagen;}
      if($pdf){
				  $publicacion->pathPDF=$rutadepdf;}
				  
			$r3=$publicacion->save();
      \Session::flash('message',' Publicacion realizada');
      return $this->index($idPub);

	  }   

    public function show(){
      $publicaciones = Publicacion::paginate(8);
      return view ('administracion.publicaciones.listar_publicaciones', compact('publicaciones'));
    }

    public function find(Request $request){
      $dato=$request->buscarDato;

      $publicaciones = DB::select(DB::raw("select * from publicacions where UPPER(titulo) like UPPER('%$dato%')
                        or UPPER(descripcion) like UPPER('%$dato%')"));

      return view ('administracion.publicaciones.listar_publicaciones', compact('publicaciones'));
    }

    public function delete($id){
      Publicacion::destroy($id);

      \Session::flash('message',' Publicacion eliminada');
      return $this->show();
    }
}
