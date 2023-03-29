<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cadastro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body class="bg-dark">
    <div class="container d-flex align-items-center justify-content-center vh-100 mt-5">
        <div class="border border-light rounded p-4 mx-auto col-sm-10 col-md-8 col-lg-6 col-xl-4">
            <form method="post" action="{{route('cadastraUsuario')}}" class="container">
                <div>
                    <br>
                    <p class="h2 text-center text-white">CADASTRE-SE</p>
                    <br>
                </div>

                <div class="form-group text-center">
                    @csrf
                    <div class="input-group mb-sm-1 mx-auto d-flex w-100">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-dark text-white inputGroup-sizing-default">Usuário</span>
                        </div>
                        <input type="text" name="username" class="form-control" aria-label="username">
                    </div>
                    @if ($errors->has('username'))
                        <div class="small text-danger mx-auto">
                            {{ $errors->first('username') }}
                        </div>
                    @endif

                    <br><br>
                    <div class="input-group mb-sm-1 mx-auto d-flex w-100">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-dark text-white inputGroup-sizing-default">&ensp;Email&ensp;</span>
                        </div>
                        <input type="text" name="email" class="form-control" aria-label="email">
                    </div>

                    @if ($errors->has('email'))
                        <div class="small text-danger mx-auto">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <br><br>
                    <div class="input-group mb-sm-1 mx-auto d-flex w-100 inputGroup-sizing-default">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-dark text-white">&ensp;Senha&nbsp;</span>
                        </div>
                        <input type="password" class="form-control" aria-label="password" name="password">
                    </div>
                    @if ($errors->has('password'))
                        <div class="small text-danger mx-auto">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                    <br><br>

                    {{--INSERIR MENSAGEM DE ERRO--}}

                    <div>
                        <a href=" {{route('login')}} " class="btn btn-outline-light mx-2">Fazer login</a>
                        <input class="btn btn-outline-success mx-2" type="submit" value="Cadastrar">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
