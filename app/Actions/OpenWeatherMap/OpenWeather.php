<?php

namespace App\Actions\OpenWeatherMap;

use AllowDynamicProperties;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

#[AllowDynamicProperties]abstract class OpenWeather
{
    protected Collection $query;
    public function __construct()
    {
        $this->query = collect();
        $this->apiUrl = config('weather.api_url');
        $this->apiKey = config('weather.api_key');
        $this->query->put('appid', $this->apiKey);
    }

    /**
     * @return array
     */
    protected function getRequest(): array
    {
        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
            ])->get(
                $this->url,
                $this->query->toArray()
            );

            if ($response->successful()) {
                return [
                    'data' => $response->json(),
                    'errors'=> null,
                    'status' => $response->status(),
                    'message' => 'Ok',
                ];
            }

            return [
                'errors' => $response->json(),
                'status' => $response->status(),
                'data' => null,
                'message' => 'Error',
            ];

        } catch (\Throwable $throwable) {
            Log::error(__METHOD__.' '.$throwable->getMessage());
            return [
                'errors' => ['Server error'],
                'status' => 500,
                'data' => null,
                'message' => 'Error',

            ];
        }
    }
}
