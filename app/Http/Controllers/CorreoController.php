<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use DB;
use App\Grado;
use App\Estudiante;
use Illuminate\Support\Facades\Input;
use Storage;

class CorreoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear(){ 
        return view("correo.form_mail");
    }


    public function enviar(Request $request){
    
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
        $r= Mail::send('correo.plantilla_correo', $data, function ($message) use ($asunto,$destinatario,  $containfile,$pathToFile) {
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

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

    public function CorreosInstitucionales(){
        $directores = DB::select(DB::raw("select * from correosinstitucionales"));
        return view ('correo.CorreosInstitucionales', compact('directores'));
    }

    public function mailsPadres(){
        $listaCursos=Grado::get();
       return view ('correo.correosPadres', compact ('listaCursos')); 
    }

    public function listarMails(){
        $idGrado=Input::get('id');

        //select user_id,estado,acudiente,email_acu,name,last_name from estudiantes join users on (users.id=estudiantes.user_id) and grado_id=1

        $dataEstudiantes=Estudiante::join('users','estudiantes.user_id','=','users.id')
                    ->where('grado_id','=',$idGrado)
                    ->select('user_id','estado','acudiente','email_acu','name','last_name','email')
                    ->orderBy('user_id')
                    ->get();


        return $dataEstudiantes;
    }
    


}
