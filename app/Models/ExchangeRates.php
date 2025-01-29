<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ExchangeRates extends Model
{

    const CURRENCY_USD = "USD";
    const  CURRENCY_EUR = "EUR";
    const CURRENCY_RUB = "RUB";

    const AVAILABLE_CURRENCIES = [
        self::CURRENCY_USD,
        self::CURRENCY_EUR,
        self::CURRENCY_RUB,
    ];

    protected $table = "exchange_rates";

    protected $fillable = [
        "currency",
        "value"
    ];

    public static function getCurrencyForToday($currency) {
        return self::where('currency', $currency)->whereDate('created_at', Carbon::now())->first();
    }
}
