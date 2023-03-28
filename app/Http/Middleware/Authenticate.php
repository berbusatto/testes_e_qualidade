<?php

namespace App\Http\Middleware;

use App\Http\Requests\UserStoreRequest;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        $reqErro = new UserStoreRequest();
        $mensagemErro = $reqErro->messages();
        $erro = $mensagemErro['isFromErrorLogin'];
        return route('loginErro', ['isFromErrorLogin'=> $erro]);

    }
}
