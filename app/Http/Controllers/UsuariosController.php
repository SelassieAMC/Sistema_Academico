<?php namespace App\Http\Controllers;

use App\User;
use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Redirect;

class UsuariosController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}


	//presenta el formulario para nuevo usuario
	public function agregar_nuevo_usuario(Request $request)	{

		$data=$request->all();
		$usuario= new User;
		$usuario->id= $data["id"];
		$usuario->type= $data["type"];
		$usuario->name= $data["name"];
		$usuario->last_name=$data["last_name"];
		$usuario->rol=$data["rol"];
		$usuario->telefono=$data["telefono"];
		$usuario->email=$data["email"];
		$usuario->direccion=$data["direccion"];
		$usuario->password=bcrypt($data["password"]);

		$resul= $usuario->save();

		if($resul){
            return view("mensajes.msj_correcto")->with("msj","Usuario Registrado Correctamente");   
		}
		else{            
             return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  
		}
	}

	public function form_nuevo_usuario(){
		return view('administracion.usuarios.form_nuevo_usuario');
	}

	public function lista_usuarios(){
        $usuarios= User::select()->get();

        //return $usuarios;
        return view('administracion.usuarios.lista_usuarios')->with("usuarios", $usuarios );
	}

//Funciones para editar datos de usuarios
	public function form_editar_usuario($id){
		//funcion para cargar los datos de cada usuario en la ficha
		$usuario=User::find($id);
		$contador=count($usuario);
		if($contador>0){          
            return view("administracion.usuarios.form_editar_usuario")->with("usuario",$usuario);   
		}
		else{            
            return view("mensajes.msj_rechazado")->with("msj","el usuario con ese id no existe o fue borrado");  
		}
	}

	public function form_perfil_usuario($id){
		//funcion para cargar los datos de cada usuario en la ficha
		$usuario=User::find($id);
		$contador=count($usuario);
		if($contador>0){          
            return view("PerfilUsuario")->with("usuario",$usuario);   
		}
		else{            
            return view("mensajes.msj_rechazado")->with("msj","el usuario con ese id no existe o fue borrado");  
		}
	}

	public function actualizar_usuario(Request $request){

		$data=$request->all();
		$idUsuario=$data["id"];
		$usuario=User::find($idUsuario);
		$usuario->type= $data["type"];
		$usuario->name= $data["name"];
		$usuario->last_name=$data["last_name"];
		//$usuario->rol=$data["rol"];
		$usuario->telefono=$data["telefono"];
		$usuario->email=$data["email"];
		$usuario->direccion=$data["direccion"];
		
		$resul= $usuario->save();

		if($resul){
            return view("mensajes.msj_correcto")->with("msj","Datos actualizados Correctamente");  
		}
		else{ 
            return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  
		}
	}

	public function subir_imagen_usuario(Request $request){

	    $id=$request->input('id_usuario_foto');
		$archivo = $request->file('archivo');
        $input  = array('image' => $archivo);
        $reglas = array('image' => 'required|image|mimes:jpeg,jpg,bmp,png,gif|max:2000'); //en Kbytes
        $validacion = Validator::make($input,  $reglas);
        if ($validacion->fails()){
          return view("mensajes.msj_rechazado")->with("msj","El archivo no es una imagen valida");
        }
        else {
	        $nombre_original=$archivo->getClientOriginalName();
			$extension=$archivo->getClientOriginalExtension();
			$nuevo_nombre=$id.".".$extension;

		    $r1=Storage::disk('ImagenesPerfil')->put($nuevo_nombre,  \File::get($archivo) ); //Guardando Imagen
		    $rutadelaimagen="../storage/ImagenesPerfil/".$nuevo_nombre;
	    
		    if ($r1){
			    $usuario=User::find($id);
			    $usuario->avatarurl=$rutadelaimagen;
			    $r2=$usuario->save();
		        return view("mensajes.msj_correcto")->with("msj","Imagen agregada correctamente");
		    }
		    else{
		    	
		    }
        }
	}

	public function cambiar_password(Request $request){

		$id=$request->input("id_usuario_password");
		$password=$request->input("password_usuario");
		$usuario=User::find($id);
	    $usuario->password=bcrypt($password);
	    $r=$usuario->save();

	    if($r){
           return view("mensajes.msj_correcto")->with("msj","password actualizado");
	    }
	    else{
	    	return view("mensajes.msj_rechazado")->with("msj","Error al actualizar el password");
	    }
	}


	public function form_cargar_datos_usuarios(){
       return view("administracion.usuarios.cargar_datos_usuarios");
	}


    public function cargar_datos_usuarios(Request $request){	
       $archivo = $request->file('archivo');
       $nombre_original=$archivo->getClientOriginalName();
	   $extension=$archivo->getClientOriginalExtension();
	   if($extension!='xlsx'){
	   		return view("mensajes.msj_rechazado")->with("msj","Error archivo invalido");
	   }
	   else{ 
       		$r1=Storage::disk('ArchivosDatos')->put($nombre_original,  \File::get($archivo) );
       		$ruta  =  storage_path('ArchivosDatos') ."\\". $nombre_original;
       		if($r1){
	           	Excel::selectSheetsByIndex(0)->load($ruta, function($reader) {
    				// get all rows from the sheet
    				$rows = $reader->all()->toArray();
    				foreach($rows as $row) {
        				// find the existing row or create a new one
        				//if(isSet($row['id'])) {
            			$usuario = User::findOrNew($row['id']);
            			if($usuario->id == $row['id']){
            					return view("mensajes.msj_rechazado")->with("msj","Error usuario ya existe");
        				} else {
            				$usuario = new User();
        				}
        				// import the data and save to storage
        				//$usuario->fill($row);
        				$usuario->id= $row['id'];
				      	$usuario->type= $row['type'];
				        $usuario->name= $row['name'];
				        $usuario->last_name= $row['last_name'];
				        $usuario->rol= $row['rol'];
				        $usuario->telefono= $row['telefono'];
				        $usuario->email= $row['email'];
		                $usuario->direccion= $row['direccion'];
		                $usuario->password= bcrypt($row['password']);
        				$usuario->save();
    				}
				});
				return view("mensajes.msj_correcto")->with("msj"," Usuarios Cargados Correctamente");
       		}
       		else{
       	    	return view("mensajes.msj_rechazado")->with("msj","Error al subir el archivo");
       		}
   		}
	}

	public function buscar_usuarios($dato=""){

        $usuarios= User::Busqueda($dato);  
        return view('administracion.usuarios.lista_usuarios')
        ->with("usuarios", $usuarios );
	}

	public function deleteUser($id){
		User::destroy($id);

		return view("mensajes.msj_correcto")->with("msj"," El usuario ha sido eliminado");
	}


}


