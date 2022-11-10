<?php

namespace App\Models;

use App\Models\Geocoder;
use Exception;

/**
 * Класс предоставляет данные погодных условий используя API сервис - Tomorrow
 */
class Tomorrow
{
    public string $apiKeyTomorrow;
    public ?string $city;
    public string $mainDomain = 'https://api.tomorrow.io/v4/timelines?';
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
     */
    public function getConvertLocation()
    {
        try {
            $converter = new Geocoder($this->city);
            [$this->geoLat, $this->geoLng] = $converter->getGeoCoder()->getGeoData();
            return $this;
        } catch (Exception) {
            return null;
        }
    }

    /**
     * Генерация url для последующего запроса
     * Установка параметров `GET` запроса 
     *
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

    /**
     * Получение данных в формате json, и их последующее декодирование в ассоциативный массив 
     *
     * @return array
     */
    public function getDataTomorrow(): array
    {
        try {
            $json = file_get_contents($this->url);
            return json_decode($json, true, 512, JSON_THROW_ON_ERROR);
        } catch (Exception) {
            echo 'Tomorrow не может вернуть результат';
        }
    }
}
