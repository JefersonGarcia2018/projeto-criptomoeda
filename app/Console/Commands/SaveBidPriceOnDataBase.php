<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\MinhasClasses\BidPrice;

class saveBidPriceOnDataBase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'c:saveBidPriceOnDataBase {criptomoeda}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Busca dados de criptomoedas no endpoint [ https://testnet.binancefuture.com/fapi/v1/ticker/price
    ] e os salva na Base de Dados.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $cripto = $this->argument('criptomoeda');

        BidPrice::fetchBidePrice($cripto) ?
            $this->info("Bid price, de {$cripto}, salvo com sucesso!"):
            $this->info('Ocorreu erro!');
    }
}
