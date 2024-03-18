<?php

namespace App\Console\Commands;

use App\Models\Currency;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

class parseCurrnecy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:currency';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Это команда парсит данные по валютам с апи центробанка';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $retryAttempts = 10; // Количество попыток повтора запроса
        $retryInterval = 5; // Интервал времени между повторными попытками в секундах
        // Получите значения ключей для каждого атрибута валюты из конфигурации
        $externalServiceUrl = Config::get('currency.external_service_url');
        $numCodeKey = Config::get('currency.num_code_key');
        $charCodeKey = Config::get('currency.char_code_key');
        $nominalKey = Config::get('currency.nominal_key');
        $nameKey = Config::get('currency.name_key');
        $valueKey = Config::get('currency.value_key');
        $vunitRate = Config::get('currency.vunit_rate');
        $this->info('Parsing XML data from CBR website...');
        for ($attempt = 1; $attempt <= $retryAttempts; $attempt++) {
            try {
                $response = Http::get($externalServiceUrl);
                $xml = simplexml_load_string($response->body());
                foreach ($xml->Valute as $valute) {
                    Log::debug($valute->{$valueKey});
                    Currency::updateOrCreate([
                        'valute_id' => (string)$valute['ID']
                    ],[
                        'num_code' => (string)$valute->{$numCodeKey},
                        'char_code' => (string)$valute->{$charCodeKey},
                        'nominal' => (int)$valute->{$nominalKey},
                        'name' => (string)$valute->{$nameKey},
                        'value' => (float)str_replace(',', '.', $valute->{$valueKey}),
                        'vunit_rate' => (float)str_replace(',', '.', $valute->{$vunitRate}),
                    ]);
                }
                $this->info('Parsing completed successfully.');
                return Command::SUCCESS;
            } catch (Throwable $e) {
                Log::error('Error occurred while fetching currency data: ' . $e->getMessage());
                if ($attempt === $retryAttempts) {
                    $this->error('Parsing error, maximum attempts reached');
                    return Command::FAILURE;
                }
                $this->warn('Parsing error, restarting the parser');
                sleep($retryInterval);
            }
        }
    }
}
