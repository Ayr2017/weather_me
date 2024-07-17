<?php

return [
    'api_key' => env('WEATHER_API_KEY'),
    'api_url' => env('WEATHER_API_URL'),
    'geocode_result_limit' => env('GEOCODE_RESULT_LIMIT', 5),
];
