<?php

namespace App\Models;

use Exception;

/**
 * Класс предоставляет данные погодных условий используя API сервис - OpenWeatherMap
 */
class OpenWeatherMap
{
    public string $apiKey;
    public ?string $city;
    public string $url;

    public function __construct($city)
    {
        $this->apiKey = env('OWM_API_KEY');
        $this->city = $city;
    }

    /**
     * Установление url для последующего запроса
     */
    public function setUrlOpenWeatherMap()
    {
        $this->url = "http://api.openweathermap.org/data/2.5/weather?q={$this->city}&lang=ru&units=metric&appid={$this->apiKey}";
        return $this;
    }

    /**
     * Получение данных в формате json, и их последующее декодирование в ассоциативный массив 
     *
     * @return array
     */
    public function getDataWeatherOpenWeatherMap(): array
    {
        try {
            $json = file_get_contents($this->url);
            return json_decode($json, true, 512, JSON_THROW_ON_ERROR);
        } catch (Exception) {
            echo "OpenWeatherMap не может вернуть результат\n";
            return [];
        }
    }
}
