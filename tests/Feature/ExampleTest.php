<?php

namespace Tests\Feature;

use App\Http\Controllers\Controller;
use App\Models\Conversao;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\DB;
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
    }

    /**
     * @throws GuzzleException
     */
    public function test_converte_real_dolar():void
    {
        $valorReal = 20;
        $cotacao = ;
        $valorDolarEsperado = $valorReal / $cotacao['USDBRL']['bid'];

        $controller = new Controller();
        $resultado = $controller->converteRealDolar($valorReal, $cotacao['USDBRL']['bid']);

        self::assertEquals($valorDolarEsperado, $resultado);
    }

    public function test_grava_resultado():void
    {
        $inputs = [1, 20, 4.98];

        $controller = new Controller();
        $controller->gravaResultado($inputs[1], $inputs[2]);

        $busca = Conversao::all()->last()->toArray();

        $outputs = [$busca['id'], $busca['valor_reais'], $busca['valor_dolar']];

        foreach ($inputs as $key1 => $value1){
            foreach ($outputs as $key2 => $value2) {
                if($key1 === $key2) {
                    self::assertEquals($value1, $value2);
                }
            }
        }
    }

    public function test_cambio_dolar():void
    {

    }

    public function test_cotacao_helper():void
    {

    }

}
