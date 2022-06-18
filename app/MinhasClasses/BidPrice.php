<?php

namespace App\MinhasClasses;

use App\Models\Criptomoeda;

class BidPrice
{
    /**
     * Acessa a API e obtém os dados: symbol, price e time.
     * 
     * @param string $nomeCripto
     * @return bool
     */
    public static function fetchBidePrice(string $nomeCripto ) {

        $ch = curl_init("https://testnet.binancefuture.com//fapi/v1/ticker/price?symbol={$nomeCripto}");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json'
        ));

        $data = json_decode(curl_exec($ch));
        curl_close($ch);

        Self::saveBidePrice($data);

        return true;
    }


    /**
     * Salva os dados na Base de Dados.
     *
     */
    private static function saveBidePrice($data) {

        $criptomoeda = new Criptomoeda;

        $criptomoeda->symbol = $data->symbol;
        $criptomoeda->bid_price = $data->price;
        $criptomoeda->time = $data->time;

        $criptomoeda->save();
    }

    /**
     * Pega o preço do último registro da criptomoeda informada e retorna se esse preço(último) está menor do que 0.5% do preço médio dos últimos 100 registros.
     * 
     * @param string $nomeCripto
     * @return bool
     */
    public static function checkBidePrice(string $nomeCripto) {

        $cripto = Criptomoeda::where('symbol',$nomeCripto)->orderBy('id', 'desc')->first();

        $mediaUltimosCem = Criptomoeda::where('symbol',$nomeCripto)->orderBy('id', 'desc')->take(100)->avg('bid_price');
    
        return ( $cripto->bid_price < ( $mediaUltimosCem - (0.5*$mediaUltimosCem)/100) ) ? true : false;
            
    }
}
