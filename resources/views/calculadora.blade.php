<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calculadora</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="bg-dark">
    <div class="container d-flex align-items-center justify-content-center vh-100 mt-5">
        <div class="border border-light rounded p-4 mx-auto col-sm-10 col-md-8 col-lg-6 col-xl-4">
            <form action="{{route('cambiodolar')}}" method="post">
                <div>
                    <br>
                    <p class="h2 text-center text-white">CONVERTA REAL EM DÓLAR</p>
                    <br>
                </div>

                <div class="form-group text-center">
                    @csrf
                    <div class="input-group mb-sm-1 mx-auto d-flex w-100">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-dark text-white inputGroup-sizing-large">R$</span>
                        </div>
                        <input type="text" name="valor_real" class="form-control" aria-label="Valor em reais" @if(isset($valorReal)) value="{{ number_format($valorReal,2) }}" @endif>
                    </div>

                    <br><br>
                    <div class="input-group mb-sm-1 mx-auto d-flex w-100">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-dark text-white inputGroup-sizing-large">U$</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Valor em dólares" name="valor_dolar" @if(isset($valorDolar)) value="{{ number_format($valorDolar,2) }}" @endif>
                    </div>

                    <br><br>
                    <div>
                        <input class="btn btn-outline-light" type="submit" value="Calcular">
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
