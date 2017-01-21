<?php

namespace App\Http\Controllers\Auth;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request; 
use Session;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('guest', ['except' => 'getLogout']);
      
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
   


//login

    protected function getLogin(){
            return view("login");
    }

    public function postLogin(Request $request){

        $messages = ['required' => 'Este campo no puede estar vacio.',];

        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'password' => 'required',
        ],$messages);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $credentials = $request->only('id', 'password');

        if ($this->auth->attempt($credentials, $request->has('remember'))){
            $usuarioactual=\Auth::user();
            $rol=\Auth::user()->rol;

            $numUsuarios=count(User::get());
            $numEstudiantes=count(User::where('rol','=','Estudiante')->get());
            $numAdmins=count(User::where('rol','=','Administrador')->get());
            $numDocentes=count(User::where('rol','=','Profesor')->get());
            $numDirectores=count(User::where('rol','=','Director')->get());
            $numRectores=count(User::where('rol','=','Rector')->get());

            if($rol=='Administrador'){
            return view('administracion.home', compact('usuarioActual','numUsuarios','numAdmins','numDirectores','numDocentes','numEstudiantes'));
            }

            if($rol=='Estudiante'){
                return view('estudiante.home')->with("usuario",  $usuarioactual);
            }

            if($rol=='Profesor'){
                return view('profesor.home')->with("usuario",  $usuarioactual);
            }

            if($rol=='Director'){
                return view('director.home')->with("usuario",  $usuarioactual);
            }

            if($rol=='Rector'){
                return view('rector.home', compact('usuarioActual','numUsuarios','numAdmins','numDirectores','numDocentes','numEstudiantes'));
            }
        }
        return $this->sendFailedLoginResponse($request);
    }

    protected function sendFailedLoginResponse(Request $request){
        return redirect()->back()
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $this->getFailedLoginMessage(),
            ]);
    }

    protected function getFailedLoginMessage(){
        return Lang::has('auth.failed')
                ? Lang::get('auth.failed')
                : 'Datos de ingreso incorrectos, verifique e intenta nuevamente.';
    }

    public function loginUsername(){
        return property_exists($this, 'username') ? $this->username : 'id';
    }

    protected function getRegister(){
        return view("administracion.registro");
    }

    protected function postRegister(Request $request){
        $this->validate($request, [
        'id'=> 'required', 
        'name' => 'required',
        'last_name'=>'required',
        'rol'=>'required',
        'email' => 'required',
        'direccion'=>'required',
        'password' => 'required',
    ]);

        $data = $request;

        $user=new User;
        $user->id=$data['id'];
        $user->name=$data['name'];
        $user->type=$data['type'];
        $user->last_name=$data['last_name'];
        $user->rol=$data['rol'];
        $user->telefono=$data['telefono'];
        $user->email=$data['email'];
        $user->direccion=$data['direccion'];
        $user->password=bcrypt($data['password']);

        if($user->save()){
             return "se ha registrado correctamente el usuario";
        }else{
            return "Error en el registro";
        }
    }

    protected function getLogout(){
        $this->auth->logout();
        Session::flush();
        return redirect('login?setFocus=true');
    }
}
