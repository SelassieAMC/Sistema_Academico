<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\HorMatCurso;
use Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Session;
use Redirect;
use DB;
use App\Boletin;
use Carbon\Carbon;




class EstudianteController extends Controller
{

  //Funcion para direccionar al formulario de creacion
    public function horarioCurso($id){
      $grado=  DB::table('estudiantes')
            ->join('grados', 'estudiantes.grado_id', '=', 'grados.id')
            ->where('estudiantes.user_id', '=', $id)
            ->value('grados.name');

      $horarios=DB::table('horarioxcurso')->where('name', '=', $grado)->get();

      return view('estudiante.Horarios.Horario', compact('horarios'));
    }

    public function SalonDirector($id){
      $grado=  DB::table('estudiantes')
            ->join('grados', 'estudiantes.grado_id', '=', 'grados.id')
            ->where('estudiantes.user_id', '=', $id)
            ->value('grados.name');

      $datos=DB::select(DB::raw("select * from salondirector where grado='$grado'"));

      return view ('estudiante.Horarios.SalonDirector', compact('datos'));
    }

     public function NotasP($id){
        $grado=  DB::table('estudiantes')
            ->join('grados', 'estudiantes.grado_id', '=', 'grados.id')
            ->where('estudiantes.user_id', '=', $id)
            ->value('grados.name');
       $idestu=  DB::table('estudiantes')
            ->where('estudiantes.user_id', '=', $id)
            ->value('estudiantes.id');
        $estado=  DB::table('estudiantes')
            ->where('estudiantes.user_id', '=', $id)
            ->value('estudiantes.estado');
        $date = Carbon::now()->year;
        $Notas = DB::select(DB::raw("select T.materia as materia,U.name || U.last_name as profesor, nota1, porcent1, nota2, porcent2, nota3, porcent3, nota4, porcent4, nota5, porcent5, bimestre1, bimestre2, bimestre3, bimestre4, definitiva, T.nombre ||' '||  T.apellido as nombre, T.grado, extract(year from T.created_at) as año FROM tablanotas T join users U
          on(T.profesor=U.id) where extract(year from T.created_at) = '$date' and estudiante='$idestu' and grado='$grado'"));
        return view ('estudiante.Notas.NotasParciales', compact('Notas','estado'));
    }

    public function HistorialA($id){
       $idestu=  DB::table('estudiantes')
            ->where('estudiantes.user_id', '=', $id)
            ->value('estudiantes.id');
        $estado=  DB::table('estudiantes')
            ->where('estudiantes.user_id', '=', $id)
            ->value('estudiantes.estado');
            $date = Carbon::now()->year;
        $Notas = DB::select(DB::raw("select T.materia as materia,U.name || U.last_name as profesor, nota1, porcent1, nota2, porcent2, nota3, porcent3, nota4, porcent4, nota5, porcent5, bimestre1, bimestre2, bimestre3, bimestre4, definitiva, T.nombre ||' '||  T.apellido as nombre, T.grado, extract(year from T.created_at) as año FROM tablanotas T join users U
          on(T.profesor=U.id) where  estudiante='$idestu' "));
        return view ('estudiante.HistorialAcademico.Historial', compact('Notas','estado','date'));
    }

    public function CorreosInstitucionales(){
        $directores = DB::select(DB::raw("select * from correosinstitucionales"));
        return view ('estudiante.Docentes.CorreosInstitucionales', compact('directores'));
    }

    public function Historia(){
      return View('estudiante.Servicios.Historia');
    }



    public function ValoresInst(){
      return View('estudiante.Servicios.Valores');
    }

    public function Himno(){
      return View('estudiante.Servicios.Himno');
    }



    public function VerificarBole($id){
      $Ruta="C:\\xampp\\htdocs\\appserv\\storage\\Boletines";
      $RutaAcceso="../storage/Boletines";
      $Ruta=$Ruta."\\".$id.".pdf";
      $RutaAcceso=$RutaAcceso."\\".$id.".pdf";
      $grado=  DB::table('estudiantes')
            ->join('grados', 'estudiantes.grado_id', '=', 'grados.id')
            ->where('estudiantes.user_id', '=', $id)
            ->value('grados.name');
       $estado=  DB::table('estudiantes')
       ->where('estudiantes.user_id', '=', $id)
       ->value('estudiantes.estado');
       $nom=  DB::table('users')
       ->where('users.id', '=', $id)
       ->value('users.name');
       $ape=  DB::table('users')
       ->where('users.id', '=', $id)
       ->value('users.last_name');
       $nombre=$nom." ".$ape;
      if(file_exists($Ruta)){
        Session::flash('message', "Observe su boletin hasta la fecha limite");
        return view('estudiante.Notas.Boletines', compact('nombre','RutaAcceso','grado','estado'));
      }else{
        Session::flash('Alertmessage', "Su boletin no existe ó La fecha limite a expirado, para observar su boletin dirijase directamente al colegio");
        return view('estudiante.Notas.Boletines', compact('nombre','RutaAcceso','grado','estado'));
      }
      
    }
  
}
