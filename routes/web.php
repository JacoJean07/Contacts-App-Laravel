<?php

use Illuminate\Http\Client\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
// existen dos metodo para crear funciones cuando es un return sin mucha logica, se puede hacer de la siguiente manera
Route::get('/contact', fn () => Response::view('contact'))->middleware('auth');
// o de la siguiente manera
Route::get('/contact', function () {
    return Response::view('contact');
})->middleware('auth');

// en la funcion se tiene que exportar el request que sea httprequest para poder usarlo
Route::post('/contact', function (HttpRequest $request) {
    // en php vanila puedes hacer un var_dump($_POST) para ver los datos que se envian o imprimirlos, sin embargo en laravel se puede hacer de la siguiente manera
    dd($request->get('name'), 200); // tambien puedes definir el codigo de estado de la respuesta como 404, 200, 500, etc.
    // dd significa dump and die, es decir, imprime y muere, es una funcion de laravel que te permite imprimir y detener la ejecucion del codigo
})->middleware('auth');
