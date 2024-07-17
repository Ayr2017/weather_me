<?php

namespace App\Actions\OpenWeatherMap;

use App\Http\Requests\Api\Weather\GetGeocodeRequest;
use Illuminate\Http\Client\ConnectionException;

class GetGeocodingAction extends OpenWeather
{
    public function __construct(GetGeocodeRequest $request)
    {
        parent::__construct();
        $this->request = $request;
        $this->query = $this->query->merge($this->request->validated());
        $this->url = $this->apiUrl.'geo/1.0/direct';

    }

    /**
     * @throws ConnectionException
     */
    public function execute(): array
    {
        return $this->getRequest();
    }
}
