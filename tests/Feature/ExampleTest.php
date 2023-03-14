<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Controller;
use App\Models\Conversao;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Helpers\cotacaoHelper;

class ExampleTest extends TestCase
{
    use DatabaseMigrations, HasFactory;
    /**
     * A basic test example.
     */
    public function test_cotacao_dolar(): void
    {
        $controller = new Controller();
        $cotacaoDolar = $controller->cotacaoDolar();

        $cotacao = cotacaoHelper::class->consomeApi();

        self::assertEquals($cotacao['USDBRL']['bid'], $cotacaoDolar);
    }

    public function test_converte_real_dolar():void
    {
        $valorReal = 20;
        $valorDolarEsperado = 3.8119198734442605;

        $cotacao = cotacaoHelper::class->consomeApi();

        $controller = new Controller();

        self::assertEquals($controller->converteRealDolar($valorReal, $cotacao['USDBRL']['bid']), $valorDolarEsperado);

    }

    public function test_grava_resultado():void
    {

    }

    public function test_cambio_dolar():void
    {

    }

}
