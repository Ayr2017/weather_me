<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class GetCurrentWeatherDataTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testGetCurrentWeatherData(): void
    {
        // Making a GET request to your endpoint
        $response = $this->get('/api/v1/get-current-weather-data?lat=51.51&lon=-0.13&units=metric&lang=ru');

        // Asserting that the request was successful
        $response->assertStatus(200);

        // Asserting the structure of the response
        $response->assertStatus(200)
            ->assertJsonStructure([
            'data',
            'status_code',
            'message',
            'errors'
        ]);
    }
}
