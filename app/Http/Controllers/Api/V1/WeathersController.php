<?php

namespace App\Http\Controllers\Api\V1;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Weather\GetCurrentWeatherDataRequest;
use App\Http\Requests\Api\Weather\GetGeocodeRequest;
use App\Modules\OpenWeather\OpenWeatherClient;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Log;

class WeathersController extends Controller
{
    /**
     * @throws ConnectionException
     */
    public function getGeocoding(GetGeocodeRequest $request, OpenWeatherClient $client): array
    {
        try {
            $validatedData = $request->validated();
            return $client->getGeocoding($validatedData);

        }catch (\Throwable $throwable){
            Log::error(__METHOD__." ".$throwable->getMessage());
            throw new ApiException();
        }

    }

    /**
     * @throws RequestException
     * @throws ConnectionException
     */
    public function getCurrentWeatherData(GetCurrentWeatherDataRequest $request, OpenWeatherClient $client): array
    {

        try {
            $validatedData = $request->validated();
            return $client->getCurrentWeatherData($validatedData);
        } catch (\Throwable $throwable){
            Log::error(__METHOD__." ".$throwable->getMessage());
            throw new ApiException();
        }

    }
}
