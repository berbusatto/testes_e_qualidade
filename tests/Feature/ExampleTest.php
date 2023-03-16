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
use App\Helpers\ComparaTesteHelper;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertTrue;

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

        // DIFERENTES ABORDAGENS

        // COM ARRAYMAP
        array_map(function ($input, $output){
            self::assertTrue($input===$output);
        }, $inputs, $outputs);

        // BUSCAR A COLLECTION E GARANTIR QUE SÓ TEM UM REGISTRO
        $buscaCollection = Conversao::all();
        self::assertCount(1,$buscaCollection);

        // PELAS DIFERENÇAS ENTRE OS ARRAYS
        $inconsistencias = array_diff_assoc($inputs, $outputs);
        self::assertEmpty($inconsistencias);

        // COMPARANDO CHAVES E VALORES DE CADA UM
        foreach ($inputs as $chave => $valor){
            if(isset($outputs[$chave]))
                self::assertEquals($valor, $outputs[$chave]);
        }
    }

    public function test_cambio_dolar():void
    {

    }

    public function test_cotacao_helper():void
    {

    }

}
