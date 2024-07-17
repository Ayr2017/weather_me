<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\OpenWeatherMap\GetCurrentWeatherDataAction;
use App\Actions\OpenWeatherMap\GetGeocodingAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;

class WeathersController extends Controller
{
    /**
     * @throws ConnectionException
     */
    public function getGeocoding(GetGeocodingAction $getGeocodingAction): array
    {
        return $getGeocodingAction->execute();
    }

    /**
     * @throws RequestException
     * @throws ConnectionException
     */
    public function getCurrentWeatherData(GetCurrentWeatherDataAction $getCurrentWeatherDataAction): array
    {
        return $getCurrentWeatherDataAction->execute();
    }
}
