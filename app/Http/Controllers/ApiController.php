<?php

namespace App\Http\Controllers;

use App\Services\CurrencyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Psy\Util\Json;

class ApiController extends Controller
{
    public function getCurrency(): JsonResponse
    {
        // Кешируеи данные на 3 часа
        $currencies = Cache::remember('all_currencies', now()->addHours(3), function () {
            return CurrencyService::getAllCurrency();
        });
        return response()->json($currencies, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
