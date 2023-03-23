<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function verificaUsuario(Request $request)
    {
        $mensagemErro = 'O nome não consta no banco de dados';
        $inputNome = $request->input('inputNome');

        $bancoNome = 'bernardo';

        if($inputNome == $bancoNome){
            return view('calculadora');
        } else{
            return view('auth.login', compact('mensagemErro'));
        }
    }
}
