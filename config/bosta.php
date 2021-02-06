<?php

return [
    'stage' => [
        'bosta_api_key' => env('STAGE_BOSTA_API_KEY', null),
        'base_url' => env('STAGE_BASE_URL', 'https://stg-app.bosta.co'),
    ],
    'production' => [
        'bosta_api_key' => env('PRODUCTION_BOSTA_API_KEY', null),
        'base_url' => env('PRODUCTION_BASE_URL', 'https://app.bosta.co'),
    ],
    'loginMethod' => 'apiKey',
];
