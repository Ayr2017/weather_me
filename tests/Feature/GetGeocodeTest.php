<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetGeocodeTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_geocode(): void
    {
        $response = $this->get('/api/v1/get-geocoding?q=Омск&limit=5');

        $response->assertStatus(200)
            ->assertJson(json_decode('{
            "data": [
                {
                    "name": "Omsk",
                    "local_names": {
                        "az": "Omsk",
                        "de": "Omsk",
                        "pt": "Omsk",
                        "es": "Omsk",
                        "lv": "Omska",
                        "kk": "Омбы",
                        "ascii": "Omsk",
                        "ru": "городской округ Омск",
                        "ja": "オムスク管区",
                        "lt": "Omskas",
                        "ka": "ომსკი",
                        "uk": "Омськ",
                        "pl": "Omsk",
                        "feature_name": "Omsk",
                        "sk": "Omsk",
                        "ca": "Omsk",
                        "sl": "Omsk",
                        "ko": "옴스크",
                        "ro": "Omsk",
                        "be": "Омск",
                        "da": "Omsk",
                        "cs": "Omsk",
                        "en": "Omsk",
                        "oc": "Omsk",
                        "zh": "鄂木斯克",
                        "et": "Omsk",
                        "hr": "Omsk",
                        "fi": "Omsk",
                        "ar": "أومسك",
                        "sr": "Омск",
                        "fr": "Omsk",
                        "uz": "Omsk"
                    },
                    "lat": 54.991375,
                    "lon": 73.371529,
                    "country": "RU",
                    "state": "Omsk Oblast"
                },
                {
                    "name": "Omsk",
                    "local_names": {
                        "uz": "Omsk",
                        "en": "Omsk",
                        "eo": "Omsko",
                        "ku": "Omsk",
                        "ru": "Омск",
                        "az": "Omsk",
                        "kk": "Омбы",
                        "tr": "Omsk"
                    },
                    "lat": 54.983006700000004,
                    "lon": 73.37452243916528,
                    "country": "RU",
                    "state": "Omsk Oblast"
                }
            ],
            "errors": null,
            "status": 200,
            "message": "Ok"
        }', true));
    }
}
