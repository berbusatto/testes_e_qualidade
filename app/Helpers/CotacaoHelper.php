<?php

namespace App\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class CotacaoHelper
{
    /**
     * @throws GuzzleException
     */
    public static function consomeApi(){
        $cliente = new Client();
        $resposta = $cliente->request('GET', 'https://economia.awesomeapi.com.br/json/last/USD-BRL');
        return json_decode($resposta->getBody(), true);
    }
}
