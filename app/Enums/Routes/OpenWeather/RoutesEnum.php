<?php

namespace App\Enums\Routes\OpenWeather;

enum RoutesEnum:string
{
    case CurrentWeatherData = 'data/2.5/weather';
    case GeocodingDirect = 'geo/1.0/direct';
}
