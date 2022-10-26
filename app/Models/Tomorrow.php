<?php

namespace App\Models;

use Geocoder;

class Tomorrow
{
    public string $apiKeyTomorrow; 
    public string $city;
    private static string $mainDomain = 'https://api.tomorrow.io/v4/timelines';
    public string $url;  

    public function __construct($city)
    {   
        $this->apiKeyTomorrow = env('TOMORROW_API_KEY'); 
        $this->city = $city; 
    }

    /**
     * Перевод названия города в географические координаты
     * Используется класс Geocoder абстракция над \OpenCage\Geocoder\Geocoder 
     *
     * @return void
     */
    private function getConvertLocation()
    {
        $converter = new Geocoder($this->city); 
        $geoCoordinate = $converter->getGeoCoder()->getGeoData(); 
        return $geoCoordinate; 
    }

    /**
     * Генерация url для последующего запроса
     * Установка параметров `GET` запроса 
     *
     * @return void
     */
    public function setUrlTomorrow()
    {
        $getParam = [
            'location' => $this->getConvertLocation(),
            'start_time' => 'now',
            'fields' => 'temperature, humidity, windSpeed, weatherCode',
            'units' => 'metric',
            'apikey' => $this->apiKeyTomorrow
        ]; 
        $this->url = static::$mainDomain . '?' . http_build_query($getParam);
        return $this; 
    }

    public function getDataTomorrow(): array
    {
        $json = file_get_contents($this->url);
        return json_decode($json, true, 512, JSON_THROW_ON_ERROR); 
    }

}