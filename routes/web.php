<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;

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

Route::get('/', function () {
    return view('welcome');//cnalisar las solicitudes que hace un usuario en este caso las de welcome
});

//Route::get('/empleado', function () {return view('empleado.index'); });

//Route::get('empleado/create',[EmpleadoController::class,'create']);//solo puedo acceder a create
Route::resource('empleado', EmpleadoController::class);// ya aqui se puede acceder a todas las url


