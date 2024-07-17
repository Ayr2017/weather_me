<?php

namespace App\Actions\OpenWeatherMap;

use App\Http\Requests\Api\Weather\GetCurrentWeatherDataRequest;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;

class GetCurrentWeatherDataAction extends OpenWeather
{
    public function __construct(GetCurrentWeatherDataRequest $request)
    {
        parent::__construct();
        $this->request = $request;
        $this->query = $this->query->merge($this->request->validated());
        $this->url = $this->apiUrl . 'data/2.5/weather';
    }


    /**
     * @throws RequestException
     * @throws ConnectionException
     */
    public function execute(): array
    {
        return $this->getRequest();
    }

}
