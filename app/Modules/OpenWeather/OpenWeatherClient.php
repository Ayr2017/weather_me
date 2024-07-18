<?php

namespace App\Modules\OpenWeather;

use App\Enums\Routes\OpenWeather\RoutesEnum;
use App\Modules\OpenWeather\Contracts\OpenWeatherContract;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;

final class OpenWeatherClient implements OpenWeatherContract
{
    private Client $client;
    private string $url;
    public function __construct()
    {
        $this->client = new Client(
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ]
            ]);
        $this->url = Config::get('weather.api_url');
    }
    public function getCurrentWeatherData(array $query = []): array
    {
        $query = array_merge($query, ['appid' => Config::get('weather.api_key')]);

        $response = $this->client->get( $this->url.RoutesEnum::CurrentWeatherData->value,[
            'query' => $query,
        ]);

        return $this->prepareResponse($response);
    }

    public function getGeocoding(array $query = []): array
    {
        $query = array_merge($query, ['appid' => Config::get('weather.api_key')]);

        $response = $this->client->get( $this->url.RoutesEnum::GeocodingDirect->value,[
            'query' => $query,
        ]);

        return $this->prepareResponse($response);
    }


    private function prepareResponse($response): array
    {

        if($response->getStatusCode() == 200){
            return [
                'data'=>json_decode($response->getBody(), true),
                'status_code'=>$response->getStatusCode(),
                'errors'=>null,
                'message'=>'Ok',
            ];
        }

        return [
            'errors' => json_decode($response->getBody(), true),
            'status' => $response->status(),
            'data' => null,
            'message' => 'Error',
        ];
    }
}
