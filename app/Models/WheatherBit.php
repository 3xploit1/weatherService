<?php

namespace App\Models;

class WheatherBit
{
    public string $city; 
    public string $url; 
    public string $apiKeyWeatherBit; 

    public function __construct($city)
    {       
        $this->city = $city; 
        $this->apiKeyWeatherBit = env('WEATHERBIT_API_KEY'); 
    }

    public function setUrlWeatherBit()
    {
        $this->url = "https://api.weatherbit.io/v2.0/current?city={$this->city},RU&key={$this->apiKeyWeatherBit}"; 
        return $this; 
    }

    public function getDataWeatherBit(): array 
    {
        $json = file_get_contents($this->url);
        return json_decode($json, true, 512, JSON_THROW_ON_ERROR); 
    }
}

