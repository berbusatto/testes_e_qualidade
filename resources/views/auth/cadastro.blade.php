<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body class="bg-dark">

    <form method="post" action="{{route('cadastraUsuario')}}">

        <div class="border border-light rounded p-4 mx-auto" style="max-width: 600px;">
            <br>
            <p class="h2 text-center text-white">CADASTRE-SE</p>
            <br>

            <div class="form-group text-center">
                @csrf
                <div class="input-group mb-lg-1 mx-auto" style="width: 250px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-white">Usuário</span>
                    </div>
                    <input type="text" name="username" class="form-control" aria-label="username">
                </div>

                <br><br>
                <div class="input-group mb-lg-1 mx-auto" style="width: 250px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-white">&ensp;Email&ensp;</span>
                    </div>
                    <input type="text" name="email" class="form-control" aria-label="email">
                </div>

                <br><br>

                <div class="input-group mb-lg-1 mx-auto" style="width: 250px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-white">&ensp;Senha&ensp;</span>
                    </div>
                    <input type="password" class="form-control" aria-label="password" name="password">
                </div>

                {{--                    INSERIR MENSAGEM DE ERRO--}}

                <br>
                <a href=" {{route('login')}} " class="btn btn-outline-light">Fazer login</a>
                <input class="btn btn-outline-success" type="submit" value="Cadastrar">



            </div>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
