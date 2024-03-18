<?php

return [
    'external_service_url' => env('EXTERNAL_SERVICE_URL', 'http://www.cbr.ru/scripts/XML_daily.asp'),
    'num_code_key' => 'NumCode', // Параметр для кода валюты
    'char_code_key' => 'CharCode', // Параметр для символьного кода валюты
    'nominal_key' => 'Nominal', // Параметр для номинала
    'name_key' => 'Name', // Параметр для названия валюты
    'value_key' => 'Value', // Параметр для стоимости валюты
    'vunit_rate' => 'VunitRate', // Параметр для стоимости валюты
];
