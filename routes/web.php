<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',
    [AuthController::class, 'formularioCadastro']);

Route::post('/cadastra',
    [UserController::class, 'store'])->name('cadastraUsuario');

Route::get('/login',
    [AuthController::class, 'formularioLogin'])->name('login');

Route::get('/calculadora', function () {
    return view('calculadora');
})->name('calculadora');

Route::post('/calculadora/envia',
    [Controller::class, 'cambioDolar'])
    ->name('cambiodolar');



//Route::post('/',
//    [Controller::class, 'verificaUsuario'])
//    ->name('verificaUsuario')->middleware('auth');






