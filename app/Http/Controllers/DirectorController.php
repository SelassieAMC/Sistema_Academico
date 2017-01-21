<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Nota;
use App\HorMatCurso;
use Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Session;
use Redirect;
use DB;
use Carbon\Carbon;



class DirectorController extends Controller
{

  //Funcion para direccionar al formulario de creacion
    public function horarioClases($id){
        $horarios=DB::select(DB::raw("select *from horarioprofes where profesor='$id'"));
        return view('director.Horarios.HorarioClase', compact('horarios'));
    }

    public function SalonesDictaClase($id){
      $datos=DB::select(DB::raw("select *from salonesdictaprofe where profesor='$id'"));
      return view ('director.Horarios.SalonesDicta', compact('datos'));
    }

    public function CorreosInstitucionales(){
        $directores = DB::select(DB::raw("select * from correosinstitucionales"));
        return view ('director.Docentes.CorreosInstitucionales', compact('directores'));
    }

    public function NotasParciales($id){
        $Materias = DB::select(DB::raw("select *from materiasdictaprofe where Profesor='$id'"));
        return view ('director.Notas.Cursos', compact('Materias'));
    }

    public function TablaNotas(){
      $date = Carbon::now()->year;
      $id=$_GET['id'];
      $mate=$_GET['mate'];
      $grad=$_GET['grad'];
        $Notas = DB::select(DB::raw("select *from tablanotas
         where extract(year from created_at) = '$date'
          and profesor='$id' and materia='$mate' and grado='$grad' order by apellido, nombre"));
        return view ('director.Notas.ListNota', compact('Notas','id','mate','grad'));
    }

    public function ActualizarNota(Request $request){
      $data=$request->all();
      $num=$_GET['num'];
      $idarrg=$request->input('idd');
      $id=$idarrg[$num-1];
      $nomarrg=$request->input('nom');
      $nom=$nomarrg[$num-1];
      $apearrg=$request->input('ape');
      $ape=$apearrg[$num-1];
      $Nota1arrg=$request->input('Not1');
      $Nota1=$Nota1arrg[$num-1];
      $Nota2arrg=$request->input('Not2');
      $Nota2=$Nota2arrg[$num-1];
      $Nota3arrg=$request->input('Not3');
      $Nota3=$Nota3arrg[$num-1];
      $Nota4arrg=$request->input('Not4');
      $Nota4=$Nota4arrg[$num-1];
      $Nota5arrg=$request->input('Not5');
      $Nota5=$Nota5arrg[$num-1];
      //encaso de que alguna nota sea nula cambiarla de texto a null
      if($Nota1==""){
        $Nota1=null;
      }
      if($Nota2==""){
        $Nota2=null;
      }
      if($Nota3==""){
        $Nota3=null;
      }
      if($Nota4==""){
        $Nota4=null;
      }
      if($Nota5==""){
        $Nota5=null;
      }
      if($Nota1<=50 && $Nota2<=50 && $Nota3<=50 && $Nota4<=50 && $Nota5<=50 ){
        if($Nota1>=0 && $Nota2>=0 && $Nota3>=0 && $Nota4>=0 && $Nota5>=0 ){
           $Nota= Nota::find($id);
           $Nota->nota1=$Nota1;
           $Nota->nota2=$Nota2;
           $Nota->nota3=$Nota3;
           $Nota->nota4=$Nota4;
           $Nota->nota5=$Nota5;
           $resul= $Nota->save();
        Session::flash('message', "Notas actualizadas del Estudiante: ".$nom." ".$ape);
      }else{
        Session::flash('Alertmessage', "Error ninguna nota debe ser negativa");
      }
      }else{
        Session::flash('Alertmessage', "Error ninguna nota debe ser mayor a 50");
      }
     return redirect()->back();
     }


     public function ActualizarPorcen(Request $request){
       $date = Carbon::now()->year;
       $idproarrg=$request->input('idpro');
       $idpro=$idproarrg[0];
       $matearrg=$request->input('mate');
       $mate=$matearrg[0];
       $matee=DB::table('materias')
            ->where('materias.nombre', '=', $mate)
            ->value('materias.id');
       $gradarrg=$request->input('grade');
       $grad=$gradarrg[0];
       $Porc1=$request->input('Porce1');
       $Porc2=$request->input('Porce2');
       $Porc3=$request->input('Porce3');
       $Porc4=$request->input('Porce4');
       $Porc5=$request->input('Porce5');
       if($Porc1 != null && $Porc2 != null && $Porc3 != null && $Porc4 != null && $Porc5 != null){
       $Sum=$Porc1+$Porc2+$Porc3+$Porc4+$Porc5;
       if($Sum==100){
         DB::update("update notas set Porcent1='$Porc1', Porcent2='$Porc2', Porcent3='$Porc3', Porcent4='$Porc4', Porcent5='$Porc5'
          where extract(year from created_at) = '$date' and nota_profesor='$idpro' and nota_materia='$matee'
          and (select G.name from estudiantes E join grados G on(E.grado_id=G.id) where E.id=nota_estudiante)='$grad'");
         Session::flash('message', "Porcentajes actualizados correctamente");
       }else{
         Session::flash('Alertmessage', "Error la suma de los porcentajes no debe ser ni mayor o menor a 100");
       }
       }else{
         Session::flash('Alertmessage', "Error debe ingresar los 5 porcentajes");
       }
      return redirect()->back();
      }

      public function Bimestre1(Request $request){
        $num=$_GET['num'];
        $idarrg=$request->input('idd');
        $id=$idarrg[$num-1];
        $Porc1arrg=$request->input('Porc1');
        $Porc1=$Porc1arrg[$num-1];
        $Porc2arrg=$request->input('Porc2');
        $Porc2=$Porc2arrg[$num-1];
        $Porc3arrg=$request->input('Porc3');
        $Porc3=$Porc3arrg[$num-1];
        $Porc4arrg=$request->input('Porc4');
        $Porc4=$Porc4arrg[$num-1];
        $Porc5arrg=$request->input('Porc5');
        $Porc5=$Porc5arrg[$num-1];
        $Nota1arrg=$request->input('Not1');
        $Nota1=$Nota1arrg[$num-1];
        $Nota2arrg=$request->input('Not2');
        $Nota2=$Nota2arrg[$num-1];
        $Nota3arrg=$request->input('Not3');
        $Nota3=$Nota3arrg[$num-1];
        $Nota4arrg=$request->input('Not4');
        $Nota4=$Nota4arrg[$num-1];
        $Nota5arrg=$request->input('Not5');
        $Nota5=$Nota5arrg[$num-1];
        if($Porc1 != null && $Porc2 != null && $Porc3 != null && $Porc4 != null && $Porc5 != null){
        if($Nota1!=null && $Nota2!=null && $Nota3!=null && $Nota4!=null && $Nota5!=null){
        $result1=($Porc1*$Nota1)/100;
        $result2=($Porc2*$Nota2)/100;
        $result3=($Porc3*$Nota3)/100;
        $result4=($Porc4*$Nota4)/100;
        $result5=($Porc5*$Nota5)/100;
        $Suma=$result1+$result2+$result3+$result4+$result5;
        $Nota= Nota::find($id);
        $Nota->nota1=null;
        $Nota->nota2=null;
        $Nota->nota3=null;
        $Nota->nota4=null;
        $Nota->nota5=null;
        $Nota->porcent1=null;
        $Nota->porcent2=null;
        $Nota->porcent3=null;
        $Nota->porcent4=null;
        $Nota->porcent5=null;
        $Nota->bimestre1=$Suma;
        $resul= $Nota->save();
        Session::flash('message', "La definitiva del Bimestre 1 ha sido generada satisfactoriamente");
      }else{
        Session::flash('Alertmessage', "Error debe tener todas las notas y actualizarlas");
      }
        }else{
         Session::flash('Alertmessage', "Error debe tener todos los porcentajes ingresados para calcular la nota");
       }
        return redirect()->back();
       }

       public function Bimestre2(Request $request){
         $num=$_GET['num'];
          $idarrg=$request->input('idd');
          $id=$idarrg[$num-1];
          $Porc1arrg=$request->input('Porc1');
          $Porc1=$Porc1arrg[$num-1];
          $Porc2arrg=$request->input('Porc2');
          $Porc2=$Porc2arrg[$num-1];
          $Porc3arrg=$request->input('Porc3');
          $Porc3=$Porc3arrg[$num-1];
          $Porc4arrg=$request->input('Porc4');
          $Porc4=$Porc4arrg[$num-1];
          $Porc5arrg=$request->input('Porc5');
          $Porc5=$Porc5arrg[$num-1];
          $Nota1arrg=$request->input('Not1');
          $Nota1=$Nota1arrg[$num-1];
          $Nota2arrg=$request->input('Not2');
          $Nota2=$Nota2arrg[$num-1];
          $Nota3arrg=$request->input('Not3');
          $Nota3=$Nota3arrg[$num-1];
          $Nota4arrg=$request->input('Not4');
          $Nota4=$Nota4arrg[$num-1];
          $Nota5arrg=$request->input('Not5');
          $Nota5=$Nota5arrg[$num-1];
          if($Porc1 != null && $Porc2 != null && $Porc3 != null && $Porc4 != null && $Porc5 != null){
         if($Nota1!=null && $Nota2!=null && $Nota3!=null && $Nota4!=null && $Nota5!=null){
         $result1=($Porc1*$Nota1)/100;
         $result2=($Porc2*$Nota2)/100;
         $result3=($Porc3*$Nota3)/100;
         $result4=($Porc4*$Nota4)/100;
         $result5=($Porc5*$Nota5)/100;
         $Suma=$result1+$result2+$result3+$result4+$result5;
         $Nota= Nota::find($id);
         $Nota->nota1=null;
         $Nota->nota2=null;
         $Nota->nota3=null;
         $Nota->nota4=null;
         $Nota->nota5=null;
         $Nota->porcent1=null;
         $Nota->porcent2=null;
         $Nota->porcent3=null;
         $Nota->porcent4=null;
         $Nota->porcent5=null;
         $Nota->bimestre2=$Suma;
         $resul= $Nota->save();
         Session::flash('message', "La definitiva del Bimestre 2 ha sido generada satisfactoriamente");
         }else{
        Session::flash('Alertmessage', "Error debe tener todas las notas y actualizarlas");
        }
        }else{
         Session::flash('Alertmessage', "Error debe tener todos los porcentajes ingresados para calcular la nota");
       }
         return redirect()->back();
        }

        public function Bimestre3(Request $request){
          $num=$_GET['num'];
          $idarrg=$request->input('idd');
          $id=$idarrg[$num-1];
          $Porc1arrg=$request->input('Porc1');
          $Porc1=$Porc1arrg[$num-1];
          $Porc2arrg=$request->input('Porc2');
          $Porc2=$Porc2arrg[$num-1];
          $Porc3arrg=$request->input('Porc3');
          $Porc3=$Porc3arrg[$num-1];
          $Porc4arrg=$request->input('Porc4');
          $Porc4=$Porc4arrg[$num-1];
          $Porc5arrg=$request->input('Porc5');
          $Porc5=$Porc5arrg[$num-1];
          $Nota1arrg=$request->input('Not1');
          $Nota1=$Nota1arrg[$num-1];
          $Nota2arrg=$request->input('Not2');
          $Nota2=$Nota2arrg[$num-1];
          $Nota3arrg=$request->input('Not3');
          $Nota3=$Nota3arrg[$num-1];
          $Nota4arrg=$request->input('Not4');
          $Nota4=$Nota4arrg[$num-1];
          $Nota5arrg=$request->input('Not5');
          $Nota5=$Nota5arrg[$num-1];
           if($Porc1 != null && $Porc2 != null && $Porc3 != null && $Porc4 != null && $Porc5 != null){
          if($Nota1!=null && $Nota2!=null && $Nota3!=null && $Nota4!=null && $Nota5!=null){
          $result1=($Porc1*$Nota1)/100;
          $result2=($Porc2*$Nota2)/100;
          $result3=($Porc3*$Nota3)/100;
          $result4=($Porc4*$Nota4)/100;
          $result5=($Porc5*$Nota5)/100;
          $Suma=$result1+$result2+$result3+$result4+$result5;
          $Nota= Nota::find($id);
          $Nota->nota1=null;
          $Nota->nota2=null;
          $Nota->nota3=null;
          $Nota->nota4=null;
          $Nota->nota5=null;
          $Nota->porcent1=null;
          $Nota->porcent2=null;
          $Nota->porcent3=null;
          $Nota->porcent4=null;
          $Nota->porcent5=null;
          $Nota->bimestre3=$Suma;
          $resul= $Nota->save();
          Session::flash('message', "La definitiva del Bimestre 3 ha sido generada satisfactoriamente");
          }else{
        Session::flash('Alertmessage', "Error debe tener todas las notas y actualizarlas");
         }
         }else{
         Session::flash('Alertmessage', "Error debe tener todos los porcentajes ingresados para calcular la nota");
         }
          return redirect()->back();
         }

         public function Bimestre4(Request $request){
            $num=$_GET['num'];
            $idarrg=$request->input('idd');
            $id=$idarrg[$num-1];
            $Porc1arrg=$request->input('Porc1');
            $Porc1=$Porc1arrg[$num-1];
            $Porc2arrg=$request->input('Porc2');
            $Porc2=$Porc2arrg[$num-1];
            $Porc3arrg=$request->input('Porc3');
            $Porc3=$Porc3arrg[$num-1];
            $Porc4arrg=$request->input('Porc4');
            $Porc4=$Porc4arrg[$num-1];
            $Porc5arrg=$request->input('Porc5');
            $Porc5=$Porc5arrg[$num-1];
            $Nota1arrg=$request->input('Not1');
            $Nota1=$Nota1arrg[$num-1];
            $Nota2arrg=$request->input('Not2');
            $Nota2=$Nota2arrg[$num-1];
            $Nota3arrg=$request->input('Not3');
            $Nota3=$Nota3arrg[$num-1];
            $Nota4arrg=$request->input('Not4');
            $Nota4=$Nota4arrg[$num-1];
            $Nota5arrg=$request->input('Not5');
            $Nota5=$Nota5arrg[$num-1];
            if($Porc1 != null && $Porc2 != null && $Porc3 != null && $Porc4 != null && $Porc5 != null){
           if($Nota1!=null && $Nota2!=null && $Nota3!=null && $Nota4!=null && $Nota5!=null){
           $result1=($Porc1*$Nota1)/100;
           $result2=($Porc2*$Nota2)/100;
           $result3=($Porc3*$Nota3)/100;
           $result4=($Porc4*$Nota4)/100;
           $result5=($Porc5*$Nota5)/100;
           $Suma=$result1+$result2+$result3+$result4+$result5;
           $Nota= Nota::find($id);
           $Nota->nota1=null;
           $Nota->nota2=null;
           $Nota->nota3=null;
           $Nota->nota4=null;
           $Nota->nota5=null;
           $Nota->porcent1=null;
           $Nota->porcent2=null;
           $Nota->porcent3=null;
           $Nota->porcent4=null;
           $Nota->porcent5=null;
           $Nota->bimestre4=$Suma;
           $resul= $Nota->save();
           Session::flash('message', "La definitiva del Bimestre 4 ha sido generada satisfactoriamente");
           }else{
            Session::flash('Alertmessage', "Error debe tener todas las notas y actualizarlas");
           }
           }else{
           Session::flash('Alertmessage', "Error debe tener todos los porcentajes ingresados para calcular la nota");
           }
           return redirect()->back();
          }

          public function Definitiva(Request $request){
            $date = Carbon::now()->year;
             $num=$_GET['num'];
            $idarrg=$request->input('idd');
            $id=$idarrg[$num-1];
            $nomarrg=$request->input('nom');
            $nom=$nomarrg[$num-1];
            $apearrg=$request->input('ape');
            $ape=$apearrg[$num-1];
            $Bime1arrg=$request->input('Bim1');
            $Bime1=$Bime1arrg[$num-1];
            $Bime2arrg=$request->input('Bim2');
            $Bime2=$Bime2arrg[$num-1];
            $Bime3arrg=$request->input('Bim3');
            $Bime3=$Bime3arrg[$num-1];
            $Bime4arrg=$request->input('Bim4');
            $Bime4=$Bime4arrg[$num-1];
            if($Bime1!=null && $Bime2!=null && $Bime3!=null && $Bime4!=null){
            $Suma=($Bime1+$Bime2+$Bime3+$Bime4)/4;
            $Nota= Nota::find($id);
            $Nota->nota1=null;
            $Nota->nota2=null;
            $Nota->nota3=null;
            $Nota->nota4=null;
            $Nota->nota5=null;
            $Nota->porcent1=null;
            $Nota->porcent2=null;
            $Nota->porcent3=null;
            $Nota->porcent4=null;
            $Nota->porcent5=null;
            $Nota->definitiva=$Suma;
            $resul= $Nota->save();
            Session::flash('message', "La definitiva del año ".$date." ha sido generada satisfactoriamente para el estudiante ".$nom." ".$ape."");
            }else{
            Session::flash('Alertmessage', "Error debe tener todos los bimestres Terminados");
            }
            return redirect()->back();
           }


    public function Historia(){
      return View('director.Servicios.Historia');
    }



    public function ValoresInst(){
      return View('director.Servicios.Valores');
    }

    public function Himno(){
      return View('director.Servicios.Himno');
    }


    public function InfoGrupo($id){
       $nom=  DB::table('users')
       ->where('users.id', '=', $id)
       ->value('users.name');
       $ape=  DB::table('users')
       ->where('users.id', '=', $id)
       ->value('users.last_name');
       $nombre=$nom." ".$ape;
        $grado=  DB::table('directorcurso')
       ->where('directorcurso.name', '=', $nom)
       ->where('directorcurso.last_name', '=', $ape)
       ->value('directorcurso.grado');
       $horarios=DB::table('horarioxcurso')->where('name', '=', $grado)->get();
      $Estudiantes= DB::table('estudiantesxcurso')->where('grado', '=', $grado)->get();
      return View('director.Grupo.InformacionGrupo', compact('nombre','grado','horarios','Estudiantes'));
    }

}

