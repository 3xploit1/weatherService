<?php

namespace App\Models;

use App\Models\Geocoder;

class Tomorrow
{
    public string $apiKeyTomorrow; 
    public string $city;
    public $mainDomain = 'https://api.tomorrow.io/v4/timelines?';
    public string $url; 
    public string $geoLat;
    public string $geoLng;  

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
    public function getConvertLocation()
    {
        $converter = new Geocoder($this->city); 
        [$this->geoLat, $this->geoLng] = $converter->getGeoCoder()->getGeoData(); 
        return $this; 
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
            'location' => "$this->geoLat, $this->geoLng",
            'start_time' => 'now',
            'fields' => 'temperature, humidity, windSpeed, weatherCode',
            'units' => 'metric',
            'apikey' => $this->apiKeyTomorrow
        ]; 
 
        $this->url = preg_replace('/%2C\+/', ',', $this->mainDomain . http_build_query($getParam));
        return $this; 
    }

    public function getDataTomorrow()
    {
        $json = file_get_contents($this->url);
        return json_decode($json, true, 512, JSON_THROW_ON_ERROR); 
    }
}
