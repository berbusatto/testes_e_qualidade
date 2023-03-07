<?php

namespace App\Http\Controllers;

use App\Models\Conversao;
use App\Models\Resultado;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use PhpParser\Node\Expr\Cast\Double;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function cambioDolar(Request $request){
        $cotacaoDolar = $this->cotacaoDolar();
        $valorReal = $request->input('valor_real');
        $valorDolar = $valorReal / $cotacaoDolar;

        $this->gravaResultado($valorReal, $valorDolar);

        return view('calculadora', compact('valorDolar'));
    }

    public function gravaResultado($valorReal, $valorDolar){
        $conversao = new Conversao([
            "valor_reais" => $valorReal,
            "valor_dolar" => $valorDolar,
            "data" => now()
        ]);
        $conversao->save();
    }

    public function cotacaoDolar()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://economia.awesomeapi.com.br/json/last/USD-BRL');
        $cotacao = json_decode($response->getBody(), true);
        return $cotacao['USDBRL']['bid'];
    }
}
