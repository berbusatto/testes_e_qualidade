<?php

namespace App\Http\Controllers;

use App\Helpers\CotacaoHelper;
use App\Models\Conversao;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ConversaoController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @throws GuzzleException
     */
    public function cambioDolar(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $cotacaoDolar = CotacaoHelper::consomeApi();
        $valorReal = $request->input('valor_real');
        $valorDolar = $this->converteRealDolar($valorReal, $cotacaoDolar);
        $this->gravaResultado($valorReal, $valorDolar);
        return view('calculadora', compact('valorDolar', 'valorReal'));
    }

    public function converteRealDolar($valorReal, $cotacaoDolar): float|int
    {
        return $valorReal / $cotacaoDolar;
    }

    public function gravaResultado($valorReal, $valorDolar)
    {
        $conversao = new Conversao([
            "valor_reais" => $valorReal,
            "valor_dolar" => $valorDolar,
            "data" => now()
        ]);
        $conversao->save();
    }
}
