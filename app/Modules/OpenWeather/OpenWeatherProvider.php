<?php

namespace App\Modules\OpenWeather;

use App\Modules\OpenWeather\Contracts\OpenWeatherContract;
use Illuminate\Support\ServiceProvider;

class OpenWeatherProvider extends ServiceProvider
{
    public array $bindings = [
        OpenWeatherContract::class => OpenWeatherClient::class,
    ];

    public function register(): void
    {
        //
    }
}
