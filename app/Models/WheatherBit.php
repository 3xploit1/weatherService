<?php

namespace App\Models;

use Exception;

/**
 * Класс предоставляет данные погодных условий используя API сервис - WheatherBit
 */
class WheatherBit
{
    public ?string $city;
    public string $url;
    public string $apiKeyWeatherBit;

    public function __construct($city)
    {
        $this->city = $city;
        $this->apiKeyWeatherBit = env('WEATHERBIT_API_KEY');
    }

    /**
     * Установление url для последующего запроса
     */
    public function setUrlWeatherBit()
    {
        $this->url = "https://api.weatherbit.io/v2.0/current?city={$this->city},RU&key={$this->apiKeyWeatherBit}";
        return $this;
    }

    /**
     * Получение данных в формате json, и их последующее декодирование в ассоциативный массив 
     *
     * @return array
     */
    public function getDataWeatherBit(): array
    {
        try {
            $json = file_get_contents($this->url);
            return json_decode($json, true, 512, JSON_THROW_ON_ERROR);
        } catch (Exception) {
            "WeatherBit не может вернуть результат\n";
            return [];
        }
    }
}
