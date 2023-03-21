<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
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

Route::get('/', function (){
    return view('login');
});

Route::post('/',
    [LoginController::class, 'verificaUsuario'])
    ->name('verificaUsuario');

Route::get('/calculadora', function () {
    return view('calculadora');
});

Route::post('/calculadora/envia',
    [Controller::class, 'cambioDolar'])
    ->name('cambiodolar');






