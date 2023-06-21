<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PortopolioController;

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
})->name('login');
Route::post('user/auth',[UserController::class, 'auth']);
Route::get('user/logout',[UserController::class, 'logout']);

Route::middleware('auth')->group(function (){
Route::get('template',[Templatecontroller::class, 'template'])->middleware('auth');


Route::get('profil',[ProfilController::class, 'show']);
Route::get('profil/add',[ProfilController::class, 'add']);
Route::post('profil/create',[ProfilController::class, 'create']);
Route::get('profil/hapus/{id}',[ProfilController::class,'hapus']);
Route::get('profil/edit/{id}',[ProfilController::class,'edit']);
Route::post('profil/update/{id}',[ProfilController::class,'update']);
Route::get('profil/search',[ProfilController::class,'search']);

Route::get('portopolio',[PortopolioController::class, 'show']);
Route::get('portopolio/add',[PortopolioController::class, 'add']);
Route::post('portopolio/create',[PortopolioController::class, 'create']);
Route::get('portopolio/hapus/{id}',[PortopolioController::class,'hapus']);
Route::get('portopolio/edit/{id}',[PortopolioController::class,'edit']);
Route::post('portopolio/update/{id}',[PortopolioController::class,'update']);
Route::get('portopolio/search',[PortopolioController::class,'search']);
});
Route::get('user',[UserController::class, 'show']);
Route::get('user/add',[UserController::class, 'add']);
Route::post('user/create',[UserController::class, 'create']);
Route::get('user/hapus/{id}',[UserController::class,'hapus']);
Route::get('user/edit/{id}',[UserController::class,'edit']);
Route::post('user/update/{id}',[UserController::class,'update']);
Route::get('user/search',[UserController::class,'search']);


Route::get('home',[Homecontroller::class, 'show']);