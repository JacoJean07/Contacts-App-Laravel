<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
// se esta creando una ruta para el metodo create del controlador ContactController
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
// se esta creando una ruta para el metodo update del controlador ContactController
Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');
// se esta creando una ruta para el metodo store del controlador ContactController
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
// se esta creando una ruta para el metodo destroy del controlador ContactController
Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');

