<?php

namespace App\Modules\OpenWeather\Contracts;

interface OpenWeatherContract
{
    public function getCurrentWeatherData(array $query = []);
}
