<?php

namespace App\Models;

class OpenWeatherMap
{
    public string $apiKey;
    public string $city;
    public string $url;

    public function __construct($city)
    {
        $this->apiKey = env('OWM_API_KEY');
        $this->city = $city;
    }

    public function setUrlOpenWeatherMap()
    {
        $this->url = "http://api.openweathermap.org/data/2.5/weather?q={$this->city}&lang=ru&units=metric&appid={$this->apiKey}";
        return $this; 
    }
    
    /**
     * Получает json из установленного url и декодирует в массив
     *
     * @return void
     */
    public function getJsonWeatherOpenWeatherMap()
    {
        $json = file_get_contents($this->url);
        return json_decode($json, true, 512, JSON_THROW_ON_ERROR); 
    }
}
