<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ConversaoController;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthConversaoController extends ConversaoController
{
    public function formularioCadastro(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('auth.cadastro');
    }

    public function formularioLogin(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('auth.login', ['isFromErrorLogin' => $request->isFromErrorLogin]);
    }

    public function login(Request $request): \Illuminate\Http\RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('calculadora'));
        }

        $reqErro = new UserStoreRequest();
        $mensagemErro = $reqErro->messages();

        return redirect()->route('login')
            ->with('mensagemErro',$mensagemErro);
    }
}
