<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use Illuminate\Support\Facades\Auth;

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

//Route::get('/', function () { return view('welcome');//cnalisar las solicitudes que hace un usuario en este caso las de welcome
//});




//Route::get('/empleado', function () {return view('empleado.index'); });

//Route::get('empleado/create',[EmpleadoController::class,'create']);//solo puedo acceder a create

Route::resource('empleado', EmpleadoController::class)->middleware('auth');// ->middleware('auth') aqui dice que si no hay autentificacion no deje pasar
Auth::routes(['register'=>false,'reset'=>false]);//desaparecer el registro y el recordar contraseña del login defautl
Route::get('/home', [EmpleadoController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('auth.login');//para que direccione de una ves al login
});


Route::group(['middleware'=>'auth'], function(){//cuando el ususarion se logee lo redireccione hacia empleado controller y este lo mande para el index
    Route::get('/home', [EmpleadoController::class, 'index'])->name('home');
});
