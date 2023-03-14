<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Controller;
use App\Models\Conversao;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

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

        $cliente = new Client();
        $resposta = $cliente->request('GET', 'https://economia.awesomeapi.com.br/json/last/USD-BRL');
        $cotacao = json_decode($resposta->getBody(), true);

        self::assertEquals($cotacao['USDBRL']['bid'], $cotacaoDolar);
    }

    public function test_converte_real_dolar():void
    {

        $valorReal = 1;

        $cliente = new Client();
        $resposta = $cliente->request('GET', 'https://economia.awesomeapi.com.br/json/last/USD-BRL');
        $cotacao = json_decode($resposta->getBody(), true);

        $controller = new Controller();
        self::assertEquals($controller->converteRealDolar($valorReal, $cotacao['USDBRL']['bid']), 1 / $cotacao['USDBRL']['bid']);

    }

}
