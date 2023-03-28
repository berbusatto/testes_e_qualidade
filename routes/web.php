<?php

use App\Http\Controllers\Auth\AuthConversaoController;
use App\Http\Controllers\ConversaoController;
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

Route::prefix('/')
    ->group(function ()
    {
        Route::get('/', [AuthConversaoController::class, 'formularioCadastro'])
            ->name('geraFormulario');

        Route::post('/cadastra', [UserController::class, 'store'])
            ->name('cadastraUsuario');

        Route::get('/login', [AuthConversaoController::class, 'formularioLogin'])
            ->name('login');

        Route::get('/login/{isFromErrorLogin}', [AuthConversaoController::class, 'formularioLogin'])
            ->name('loginErro');

        Route::post('/verifica', [AuthConversaoController::class, 'login'])
            ->name('verificaLogin');
    });

Route::prefix('calculadora')->middleware('auth')
    ->group(function ()
    {
        Route::get('/', function () {
            return view('calculadora');
        })
            ->name('calculadora');

        Route::post('/envia', [ConversaoController::class, 'cambioDolar'])
            ->name('cambiodolar');
    });










