<?php namespace App\Http\Controllers;
use App\User;

class HomeController extends Controller {

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

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index(){
		$usuarioActual=\Auth::user();
		$rol=\Auth::user()->rol;
		$numUsuarios=count(User::get());
		$numEstudiantes=count(User::where('rol','=','Estudiante')->get());
		$numAdmins=count(User::where('rol','=','Administrador')->get());
		$numDocentes=count(User::where('rol','=','Profesor')->get());
		$numDirectores=count(User::where('rol','=','Director')->get());

		if($rol=='Administrador'){
			return view('administracion.home', compact('usuarioActual','numUsuarios','numAdmins','numDirectores','numDocentes','numEstudiantes'));
		}

		if($rol=='Estudiante'){
			return view('estudiante.home')->with("usuario",  $usuarioActual);
		}

		if($rol=='Profesor'){
			return view('profesor.home')->with("usuario",  $usuarioActual);
		}

		if($rol=='Director'){
			return view('director.home')->with("usuario",  $usuarioActual);
		}

		if($rol=='Rector'){
			return view('rector.home', compact('usuarioActual','numUsuarios','numAdmins','numDirectores','numDocentes','numEstudiantes'));
		}
	}

}