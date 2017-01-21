<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Galeria;
use Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Session;
use Redirect;
use DB;




class GaleriaController extends Controller
{

  //Funcion para direccionar al formulario de creacion
    public function index($id){
      $usuario = User::find($id);
      return view('administracion.Galeria.crearFoto', compact('usuario'));
    }


    public function store(Request $request){

          $idPub=$request->input('id_publicador');
          $nombreIm=$request->input('nombre');
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
              $nuevo_nombreIma=$nombreIm.".".$extensionIma;
              Storage::disk('Galeria')->put($nuevo_nombreIma,  \File::get($imagen)); // guardando imagen
              $rutadelaimagen="../storage/Galeria/".$nuevo_nombreIma;
          }

          $Galeria= new Galeria;
          $Galeria->user_id= $idPub;
          $Galeria->nombre= $nombreIm;
          if($imagen){
             $Galeria->pathImagen= $rutadelaimagen;
          }
         $Galeria->save();
         \Session::flash('message',' Foto Guardada');
         return $this->index($idPub);

    }

    public function show(){
      $Fotos = Galeria::all();
      return view ('administracion.Galeria.listar_fotos', compact('Fotos'));
    }

    public function find($dato){
        $Fotos = DB::select(DB::raw("select * from galerias where UPPER(nombre) like UPPER('%$dato%')"));
        return view ('administracion.Galeria.listar_fotos', compact('Fotos'));
    }

    public function RespuestaE($id){
      return View('administracion.Galeria.EliminarFoto',compact('id'));
    }

    public function Eliminar($id){
      Galeria::destroy($id);
      $Fotos = Galeria::all();
      Session::flash('message','Foto eliminada correctamente');
      return View('administracion.Galeria.listar_fotos', compact('Fotos'));
    }


}
