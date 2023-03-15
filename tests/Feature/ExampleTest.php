<?php

namespace Tests\Feature;

use App\Http\Controllers\Controller;
use App\Models\Conversao;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Helpers\CotacaoHelper;

class ExampleTest extends TestCase
{
    use DatabaseMigrations, HasFactory;
    /**
     * A basic test example.
     * @throws GuzzleException
     */
    public function test_cotacao_api(): void
    {
        $cotacaoDolar = CotacaoHelper::consomeApi();
        self::assertIsArray($cotacaoDolar);
        self::assertNotEmpty($cotacaoDolar['USDBRL']['bid']);
    }

    /**
     * @throws GuzzleException
     */
    public function test_converte_real_dolar():void
    {
        $valorReal = 20;
        $cotacao = CotacaoHelper::consomeApi() ;
        $valorDolarEsperado = $valorReal / $cotacao['USDBRL']['bid'];

        $controller = new Controller();
        $resultado = $controller->converteRealDolar($valorReal, $cotacao['USDBRL']['bid']);

        self::assertEquals($valorDolarEsperado, $resultado);
    }

    public function test_grava_resultado():void
    {

        $inputs = [
            'valor_reais'=> 20,
            'valor_dolar'=>  4.98
        ];

        $controller = new Controller();
        $controller->gravaResultado($inputs['valor_reais'], $inputs['valor_dolar']);
        $busca = Conversao::all()->last()->toArray();

        $outputs = [
            'valor_reais'=> $busca['valor_reais'],
            'valor_dolar'=>$busca['valor_dolar']
        ];

        foreach ($inputs as $chave => $valor){
            if(isset($outputs[$chave]))
                self::assertEquals($valor, $outputs[$chave]);
        }

//
    }

    public function test_cambio_dolar():void
    {

    }

    public function test_cotacao_helper():void
    {

    }

}
