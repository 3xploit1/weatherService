<?php

namespace App\Models;

use Exception;

class Geocoder
{
    public string $apiKeyGeoCoder;
    public \OpenCage\Geocoder\Geocoder $geocoder;
    public ?string $city;

    public function __construct($city)
    {
        $this->apiKeyGeoCoder = env('GEOCODE_API_KEY');
        $this->city = $city;
    }

    /**
     * Создание объекта \OpenCage\Geocoder\Geocoder
     *
     */
    public function getGeoCoder()
    {
        $this->geocoder = new \OpenCage\Geocoder\Geocoder($this->apiKeyGeoCoder);
        return $this;
    }

    /**
     * Обертка над методом geocode класса \OpenCage\Geocoder\Geocoder
     * Возвращает геокоординаты (широта, долгота) города в виде массива: 
     * @return array
     */
    public function getGeoData(): array
    {
        try {
            $result = $this->geocoder->geocode($this->city);
            return [$result["results"][0]["geometry"]["lat"], $result["results"][0]["geometry"]["lng"]];
        } catch (Exception) {
            echo "GeoData не может вернуть результат\n";
            return [];
        }
    }
}
