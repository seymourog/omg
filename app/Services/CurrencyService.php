<?php

namespace App\Services;

use App\Repository\CurrencyRepository;
use Illuminate\Database\Eloquent\Collection;

class CurrencyService
{
    public static function getAllCurrency(): Collection
    {
        return CurrencyRepository::getAllCurrency();
//        return json_encode(CurrencyRepository::getAllCurrency(), true);
    }
}
