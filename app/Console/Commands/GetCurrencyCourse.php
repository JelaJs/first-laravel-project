<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetCurrencyCourse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:get-currency-course';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //$currency = $this->argument('currency');
        $urlEUR = env('CURRENCY_BASE_URL').env('CURRENCY_API_KEY').'/latest/EUR';
        $urlUSD = env('CURRENCY_BASE_URL').env('CURRENCY_API_KEY').'/latest/USD';

        $responseEUR = Http::get($urlEUR);
        $responseUSD = Http::get($urlUSD);

        $courseEUR = $responseEUR->json();
        $courseEURRSD = $courseEUR['conversion_rates']['RSD'];

        $courseUSD = $responseUSD->json();
        $courseUSDRSD = $courseUSD['conversion_rates']['RSD'];

        dd($courseUSDRSD);
    }
}
