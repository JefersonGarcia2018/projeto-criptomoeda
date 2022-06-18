<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\MinhasClasses\BidPrice;

class CheckAvgBidPrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'c:checkAvgBidPrice {criptomoeda}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'pega o preço do último registro da criptomoeda informada e retorna se esse preço(último) está menor do que 0.5% do preço médio dos últimos 100 registros.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        BidPrice::checkBidePrice($this->argument('criptomoeda'))?
        $this->info("Preco com valor menor do que o valor 0.5% menor que o valor médio dos últimos 100 precos"):
        $this->info('Preco não atingiu o valor 0.5% menor que o valor médio');
    }
}
