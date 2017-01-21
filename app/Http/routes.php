<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


 
//login logout routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
 
// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);

Route::get('/', function () {
    return redirect()->route('principal');
});

//Reset password routes...
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email','Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');

//Principal
Route::get('home', 'HomeController@index');
Route::get('principal', array('as' => 'principal','uses' => 'PrincipalController@index'));
Route::get('noticias', 'PrincipalController@noticias');
Route::get('instalaciones', 'PrincipalController@instalaciones');
Route::get('contacto', ['as ' => 'gmaps', 'uses' => 'PrincipalController@contacto']);
Route::get('QuienesSomos', 'PrincipalController@QuienesSomos');
Route::get('GaleriaShow', 'PrincipalController@GaleriaFotos');

//Rutas Galeria
Route::get('Galeria{id?}','GaleriaController@index');
Route::post('cargarFoto', 'GaleriaController@store');
Route::get('listar_fotos', 'GaleriaController@show');
Route::get('EliminarFoto{id}', array('as' => 'EliminarFoto','uses' => 'GaleriaController@RespuestaE'));
Route::delete('EliminarDestroy{id}', array('as' => 'EliminarDestroy','uses' => 'GaleriaController@Eliminar'));
Route::get('buscar_dato/{dato?}', array('as' => 'buscar_dato','uses' => 'GaleriaController@find'));

//Rutas de usuarios
Route::get('form_nuevo_usuario', 'UsuariosController@form_nuevo_usuario');
Route::post('agregar_nuevo_usuario', 'UsuariosController@agregar_nuevo_usuario');
Route::get('listado_usuarios/{page?}', 'UsuariosController@lista_usuarios');
Route::get('PerfilUsuario/{id}', 'UsuariosController@form_perfil_usuario');
Route::get('form_editar_usuario/{id}', 'UsuariosController@form_editar_usuario');
Route::post('actualizar_usuario', 'UsuariosController@actualizar_usuario');	
Route::post('subir_imagen_usuario', 'UsuariosController@subir_imagen_usuario');
Route::post('cambiar_password', 'UsuariosController@cambiar_password');
Route::get('form_cargar_datos_usuarios', 'UsuariosController@form_cargar_datos_usuarios');
Route::post('cargar_datos_usuarios', 'UsuariosController@cargar_datos_usuarios');
Route::get('buscar_usuarios/{dato?}', 'UsuariosController@buscar_usuarios');
Route::get('borrarusu{id}', 'UsuariosController@deleteUser');

//Rutas de correo
Route::get('form_enviar_correo', 'CorreoController@crear');
Route::post('enviar_correo', 'CorreoController@enviar');
Route::post('cargar_archivo_correo', 'CorreoController@store');
Route::get('CorreosInstituA','CorreoController@CorreosInstitucionales');
Route::get('CorreosInstituA','CorreoController@CorreosInstitucionales');
Route::get('infoPadres','CorreoController@mailsPadres');
Route::get('listarCorreosGrado','CorreoController@listarMails'); 


//Rutas de Publicaciones
Route::get('publicar{id?}', 'PublicacionController@index');
Route::post('cargarPublicacion', 'PublicacionController@store');
Route::get('listar_pubs', 'PublicacionController@show');
Route::get('editar_pub{id}', array('as' => 'editar_pub','uses' => 'PublicacionController@editar'));
Route::put('actualizar_pub{id}', array('as' => 'actualizar_pub','uses' => 'PublicacionController@update'));
Route::get('buscaPub', array('as' => 'buscaPub','uses' => 'PublicacionController@find'));
Route::get('eliminar_pub{id}', array('as' => 'eliminar_pub','uses' => 'PublicacionController@delete'));

//Rutas de Cursos
Route::get('curso', array('as' => 'curso','uses' => 'CursoController@index'));
Route::post('crearCurso', array('as' => 'crearCurso','uses' => 'CursoController@create'));
Route::get('listaCursos', array('as' => 'listaCursos','uses' => 'CursoController@show'));
Route::get('editar_curso{id}', array('as' => 'editar_curso','uses' => 'CursoController@editar'));
Route::get('eliminar_curso{id}', array('as' => 'eliminar_curso','uses' => 'CursoController@delete'));
Route::put('actualizar_curso{id}', array('as' => 'actualizar_curso','uses' => 'CursoController@update'));
Route::get('buscaCurso', array('as' => 'buscaCurso','uses' => 'CursoController@find'));
Route::get('horariosMatxCurso', array('as' => 'horariosMatxCurso','uses' => 'CursoController@asignMatHor'));
Route::post('registrarHorario', array('as' => 'registrarHorario','uses' => 'CursoController@regisHorario'));
Route::get('consultHorarios', array('as' => 'consultHorarios','uses' => 'CursoController@horarioXCurso'));
Route::get('eliminarHorario{id}', array('as' => 'eliminarHorario','uses' => 'CursoController@deleteHorario'));
Route::get('buscaHorCurso', array('as' => 'buscaHorCurso','uses' => 'CursoController@findHorario'));

//Rutas de Materias
Route::get('materias', array('as' => 'materias','uses' => 'MateriasController@index'));
Route::post('crearMateria', array('as' => 'crearMateria','uses' => 'MateriasController@create'));
Route::get('listaMaterias', array('as' => 'listaMaterias','uses' => 'MateriasController@show'));
Route::get('materia{id}', array('as' => 'editar_materia','uses' => 'MateriasController@editar'));
Route::put('actMateria{id}rel{rel}', array('as' => 'actualizar_materia','uses' => 'MateriasController@update'));
Route::get('buscaMateria', array('as' => 'buscaMateria','uses' => 'MateriasController@find'));
Route::get('borrarMat{id}', array('as' => 'borrarMat','uses' => 'MateriasController@delete'));
Route::get('listaProfesoresAsignados', 'MateriasController@showRelations');
Route::get('borrarRel{id}', array('as' => 'borrarRel','uses' => 'MateriasController@deleteRelation'));
Route::get('buscaMateriaProfesor', array('as' => 'buscaMateriaProfesor','uses' => 'MateriasController@findRelations'));



//Rutas de Aulas
Route::get('nuevaAula', array('as' => 'nuevaAula','uses' => 'AulasController@index'));
Route::post('crearAula', array('as' => 'crearAula','uses' => 'AulasController@create'));
Route::get('listaAulas', array('as' => 'listaAulas','uses' => 'AulasController@show'));
Route::get('editar_salon{id}', array('as' => 'editar_salon','uses' => 'AulasController@edit'));
Route::put('actualizar_salon{id}', array('as' => 'actualizar_salon','uses' => 'AulasController@update'));
Route::get('buscaAula', array('as' => 'buscaAula','uses' => 'AulasController@find'));
Route::get('asignaCurso', array('as' => 'asignaAula','uses' => 'AulasController@asignarCurso'));
Route::post('relCursoAula', array('as' => 'relCursoAula','uses' => 'AulasController@asignarAula'));
Route::get('consultaAsignaciones', array('as' => 'consultaAsignaciones','uses' => 'AulasController@consulAsigna'));
Route::get('deleteRel/{id}', array('as' => 'deleteRel','uses' => 'AulasController@delete'));
Route::get('buscaRel', array('as' => 'buscaRel','uses' => 'AulasController@findRelation'));
Route::get('borrar_salon{id}', array('as' => 'borrar_salon','uses' => 'AulasController@deleteAula'));


//Rutas Asignaciones de cursos para estudiantes y asignaciones de clases para profesores
Route::get('asignaHorariosProf', 'EstuDocentesController@clasesProfesor');
Route::get('asignaClases/{id}', 'EstuDocentesController@asignarCla');
Route::post('registrarAsignacion', 'EstuDocentesController@registAsignada');
Route::get('editClasesAsign/{id}', 'EstuDocentesController@showClases');
Route::get('deleteClases', 'EstuDocentesController@editaClasesAsign');

Route::get('asignaCursoEstu', 'EstuDocentesController@cursoEstudiante');
Route::get('buscaEstudiante', 'EstuDocentesController@findEstudiante');
Route::post('saveCurso', array('as' => 'saveCurso','uses' => 'EstuDocentesController@guardarCursos'));
Route::get('cargarDesdeArchivo','EstuDocentesController@formCargar');
Route::post('cargarDatos', array('as' => 'cargarDatos','uses' => 'EstuDocentesController@cargandoDatos'));

//Eventos Calendario
Route::get('cargaEventos{id?}','CalendarController@index');
Route::post('guardaEventos', array('as' => 'guardaEventos','uses' => 'CalendarController@create'));
Route::post('actualizaEventos','CalendarController@update');
Route::post('eliminaEvento','CalendarController@delete');

//Rutas Estudiante
Route::get('HorarioE{id?}','EstudianteController@horarioCurso');
Route::get('SalonDirector{id?}','EstudianteController@SalonDirector');
Route::get('CorreosInstitucionales','EstudianteController@CorreosInstitucionales');
Route::get('NotasP{id?}','EstudianteController@NotasP');
Route::get('HistorialA{id?}','EstudianteController@HistorialA');
Route::get('Historia','EstudianteController@Historia');
Route::get('Valores','EstudianteController@ValoresInst');
Route::get('Himno','EstudianteController@Himno');

//Rutas Profesor
Route::get('HorarioClase{id?}','ProfesorController@horarioClases');
Route::get('SalonDicta{id?}','ProfesorController@SalonesDictaClase');
Route::get('CorreosInstitu','ProfesorController@CorreosInstitucionales');
Route::get('Cursos{id?}','ProfesorController@NotasParciales');
Route::get('Tabla_nota',  'ProfesorController@TablaNotas');
Route::put('ActualizarNotas{num?}',  'ProfesorController@ActualizarNota');
Route::put('ActualizarPorce',  'ProfesorController@ActualizarPorcen');
Route::put('Bimestre1',  'ProfesorController@Bimestre1');
Route::put('Bimestre2',  'ProfesorController@Bimestre2');
Route::put('Bimestre3',  'ProfesorController@Bimestre3');
Route::put('Bimestre4',  'ProfesorController@Bimestre4');
Route::put('Definitiva',  'ProfesorController@Definitiva');
Route::get('HistoriaP','ProfesorController@Historia');
Route::get('ValoresP','ProfesorController@ValoresInst');
Route::get('HimnoP','ProfesorController@Himno');

//Rutas Director
Route::get('HorarioClasD{id?}','DirectorController@horarioClases');
Route::get('SalonDictD{id?}','DirectorController@SalonesDictaClase');
Route::get('CorreosInstitD','DirectorController@CorreosInstitucionales');
Route::get('CursoD{id?}','DirectorController@NotasParciales');
Route::get('Tabla_notaD',  'DirectorController@TablaNotas');
Route::put('ActualizarNotaD{num?}',  'DirectorController@ActualizarNota');
Route::put('ActualizarPorceD',  'DirectorController@ActualizarPorcen');
Route::put('Bimestre1D',  'DirectorController@Bimestre1');
Route::put('Bimestre2D',  'DirectorController@Bimestre2');
Route::put('Bimestre3D',  'DirectorController@Bimestre3');
Route::put('Bimestre4D',  'DirectorController@Bimestre4');
Route::put('DefinitivaD',  'DirectorController@Definitiva');
Route::get('HistoriaD','DirectorController@Historia');
Route::get('ValoresD','DirectorController@ValoresInst');
Route::get('HimnoD','DirectorController@Himno');
Route::get('InfoGroup{id?}','DirectorController@InfoGrupo');

//Rutas Rector
Route::get('verHorarios', 'RectorController@horarioDocentes');
Route::get('showHorProf/{id}', 'RectorController@mostrarHorarioProfesor');
Route::get('verEstados', 'RectorController@estadosEstudiantes');
Route::get('lista_users_noModifica/{page?}', 'RectorController@lista_usuarios');
Route::get('borrarusuRector/{dato?}', 'RectorController@buscausuario');
Route::get('form_correo_rector', 'RectorController@crearCorreo');
Route::post('enviar_correo_rector', 'RectorController@enviarCorreo');
Route::post('cargar_archivo_correo_rector', 'RectorController@storeAdjunto');
Route::get('listaMateriasRector', array('as' => 'listaMateriasRector','uses' => 'RectorController@showMaterias'));
Route::get('listaProfesoresAsignadosRector', 'RectorController@showProfesoresAsignadosMaterias');
Route::get('listaCursosRector', array('as' => 'listaCursosRector','uses' => 'RectorController@showCursos'));
Route::get('consultHorariosRector', array('as' => 'consultHorariosRector','uses' => 'RectorController@showHorariosCursos'));
Route::get('listaAulasRector', array('as' => 'listaAulasRector','uses' => 'RectorController@showAulas'));
Route::get('consultaAsignacionesRector', array('as' => 'consultaAsignacionesRector','uses' => 'RectorController@consulSalonesAsignados'));
Route::get('CorreosInstituR','RectorController@CorreosInstitucionales');
Route::get('infoPadresR','RectorController@mailsPadres');
Route::get('HistoriaR','RectorController@Historia');
Route::get('ValoresR','RectorController@ValoresInst');
Route::get('HimnoR','RectorController@Himno');

//Ruta boletines
Route::get('rutaBoletines', 'EstudianteController@rutaBoletines');
Route::post('cambiarRuta', array('as' => 'cambiarRuta','uses' => 'EstudianteController@cambiarRutaBoletines'));
Route::get('VerificarBoletin{id?}', array('as' => 'VerificarBoletin','uses' => 'EstudianteController@VerificarBole'));
