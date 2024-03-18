<?php

namespace App\Repository;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Collection;

class CurrencyRepository
{

    public static function getAllCurrency(): Collection
    {
        return Currency::all();
    }
}
