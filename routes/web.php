<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [\App\Http\Controllers\HomeController::class ,'home' ])
    ->name('home');

Route::get('noticias', [\App\Http\Controllers\NoticiasController::class ,'index' ])
    ->name('noticias');

Route::get('noticia/{id}', [\App\Http\Controllers\NoticiasController::class ,'noticiaDetalle' ])
    ->name('noticia-detalle')
    ->whereNumber('id')
    ->middleware(['auth']);

//------------------Perfil-----------------//
Route::get('perfil', [\App\Http\Controllers\PerfilController::class ,'perfil' ])
    ->name('perfil')
    ->middleware(['auth']);

Route::get('perfil/{id}/editar', [\App\Http\Controllers\PerfilController::class ,'perfilEditarForm' ])
    ->name('perfil-editar')
    ->whereNumber('id')
    ->middleware(['auth']);

Route::post('perfil/{id}/editar', [\App\Http\Controllers\PerfilController::class ,'perfilEditarEjecutar' ])
    ->name('prefil/editar/ejecutar')
    ->whereNumber('id')
    ->middleware(['auth']);


//---------------Servicios----------------------///
Route::get('servicio/{id}/editar', [\App\Http\Controllers\ServiciosController::class ,'serviciosEditarForm' ])
    ->name('servicio-editar')
    ->whereNumber('id')
    ->middleware(['auth']);

Route::post('servicio/{id}/editar', [\App\Http\Controllers\ServiciosController::class ,'serviciasEditarEjecutar' ])
    ->name('servicio/editar/ejecutar')
    ->whereNumber('id')
    ->middleware(['auth']);

Route::get('servicio/{id}/eliminar', [\App\Http\Controllers\ServiciosController::class ,'serviciosEliminarForm' ])
    ->name('servicio-eliminar')
    ->whereNumber('id')
    ->middleware(['auth']);

Route::post('servicio/{id}/eliminar', [\App\Http\Controllers\ServiciosController::class ,'serviciasEliminarEjecutar' ])
    ->name('servicio/eliminar/ejecutar')
    ->whereNumber('id')
    ->middleware(['auth']);

//------------------Admin----------------------////
Route::get('admin/noticias', [\App\Http\Controllers\AdminNoticiasController::class ,'noticiasAdmin' ])
    ->name('admin/noticias')
    ->middleware(['auth' ,'admin']);

Route::get('admin/usuarios', [\App\Http\Controllers\AdminUsuariosController::class ,'usuariosAdmin' ])
    ->name('admin/usuarios')
    ->middleware(['auth' ,'admin']);

Route::get('admin/noticias/nueva', [\App\Http\Controllers\AdminNoticiasController::class ,'noticiaNueva' ])
    ->name('admin/noticias/nueva-form')
    ->middleware(['auth' ,'admin']);

Route::post('admin/noticias/nueva', [\App\Http\Controllers\AdminNoticiasController::class ,'noticiaNuevaGrabar' ])
    ->name('admin/noticias/nueva-grabar')
    ->middleware(['auth' ,'admin']);

Route::get('admin/noticias/{id}', [\App\Http\Controllers\AdminNoticiasController::class ,'noticiaVer' ])
    ->name('admin/noticias/ver')
    ->whereNumber('id')
    ->middleware(['auth' ,'admin']);

Route::get('admin/noticias/{id}/eliminar', [\App\Http\Controllers\AdminNoticiasController::class ,'eliminarConfirmar' ])
    ->name('admin/noticias/eliminar/confirmar')
    ->whereNumber('id')
    ->middleware(['auth' ,'admin']);

Route::post('admin/noticias/{id}/eliminar', [\App\Http\Controllers\AdminNoticiasController::class ,'eliminarEjecutar' ])
    ->name('admin/noticias/eliminar/ejecutar')
    ->whereNumber('id')
    ->middleware(['auth' ,'admin']);

Route::get('admin/noticias/{id}/editar', [\App\Http\Controllers\AdminNoticiasController::class ,'editarForm' ])
    ->name('admin/noticias/editar-form')
    ->whereNumber('id')
    ->middleware(['auth' ,'admin']);

Route::post('admin/noticias/{id}/editar', [\App\Http\Controllers\AdminNoticiasController::class ,'editarEjecutar' ])
    ->name('admin/noticias/editar/ejecutar')
    ->whereNumber('id')
    ->middleware(['auth' ,'admin']);


Route::get('admin/usuarios/{id}', [\App\Http\Controllers\AdminUsuariosController::class ,'usuarioVer' ])
    ->name('admin/usuarios/ver')
    ->whereNumber('id')
    ->middleware(['auth' ,'admin']);
//--------------------------------------//

Route::get('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'loginForm'])
    ->name('auth/login/form')
    ->middleware(['guest']);
Route::post('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'loginEjecutar'])
    ->name('auth/login/ejecutar')
    ->middleware(['guest']);
Route::post('cerrar-sesion', [\App\Http\Controllers\AuthController::class, 'logout'])
    ->name('auth/logout')
    ->middleware(['auth']);

//-----------------------------------------------------//
Route::get('registro', [\App\Http\Controllers\RegistroController::class, 'registro'])
    ->name('registro')
    ->middleware(['guest']);
Route::post('registro', [\App\Http\Controllers\RegistroController::class ,'registroNuevo' ])
    ->name('registro')
    ->middleware(['guest']);

//-------------------------MercadoPago------///
Route::get('mp-confirmar/{id}', [App\Http\Controllers\MercadoPagoController::class, 'confirmarCompra'])
    ->name('mp-confirmar')
    ->whereNumber('id')
    ->middleware(['auth']);
//-------------------//
Route::get('mp-success', [App\Http\Controllers\MercadoPagoController::class, 'successEjecutar'])->name('success');


