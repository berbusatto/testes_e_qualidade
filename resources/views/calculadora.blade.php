<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Calculadora</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>

    </style>
</head>
<body>
    <br>
    <p class="h2 text-center">CALCULADORA DE CÂMBIO</p>
    <br>
    <form action="{{route('cambiodolar')}}" method="post">
        <div class="form-group text-center">
            @csrf
            <div class="input-group mb-lg-1 mx-auto" style="width: 200px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">R$</span>
                </div>
                <input type="text" name="valor_real" class="form-control" aria-label="Valor em reais" value="">
            </div>
            <br><br>
            <div class="input-group mb-lg-1 mx-auto" style="width: 200px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                </div>



                <input type="text" class="form-control" aria-label="Valor em dólares" name="resultado" @if(isset($valorDolar)) value="{{ $valorDolar }}" @endif>
            </div>
            <br><br>
            <input class="btn btn-dark" type="submit" value="Calcular">








        </div>

    </form>




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
