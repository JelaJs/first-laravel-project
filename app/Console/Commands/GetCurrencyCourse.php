<?php

namespace App\Console\Commands;

use App\Models\ExchangeRates;
use Carbon\Carbon;
use Date;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetCurrencyCourse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:get-course';

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

        foreach(ExchangeRates::AVAILABLE_CURRENCIES as $currency) {
            $url = env('CURRENCY_BASE_URL').env('CURRENCY_API_KEY')."/latest/$currency";

            $response = Http::get($url);
            $course = $response->json();
            $course = $course["conversion_rates"]['RSD'];

            $todayCourse = ExchangeRates::getCurrencyForToday($currency);

            if($todayCourse !== null) {
                continue;
            }

            ExchangeRates::create([
                'currency' => $currency,
                'value' => $course
            ]);
        }
    }
}
