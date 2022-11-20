<?php

namespace App\Http\Controllers;

use App\Models\OpenWeatherMap;
use App\Models\Tomorrow;
use App\Models\WheatherBit;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    /**
     * Получить массив геоданных с помощью сервиса OpenWeatherMap
     *
     * @param [type] $city
     */
    public function getOpenWeatherMap($city)
    {
        $data = new OpenWeatherMap($city);
        return $data->setUrlOpenWeatherMap()->getDataWeatherOpenWeatherMap();
    }

    /**
     * Получить массив геоданных с помощью сервиса WheatherBit
     *
     * @param [type] $city
     */
    public function getWheatherBit($city)
    {
        $data = new WheatherBit($city);
        return $data->setUrlWeatherBit()->getDataWeatherBit();
    }

    /**
     * Получить массив геоданных с помощью сервиса Tomorrow
     *
     * @param [type] $city
     */
    public function getTomorrow($city)
    {
        $data = new Tomorrow($city);
        if ($data->getConvertLocation())
            return $data->setUrlTomorrow()->getDataTomorrow();
        return [];
    }


    /**
     * Получить результат от всех сервисов 
     * POST запрос
     * 
     * @param Request $request
     */
    public function showResponse(Request $request)
    {
        if ($request->has('text')) {
            $data_open_weather = $this->getOpenWeatherMap($request->input('text'));
            $data_weather_bit = $this->getWheatherBit($request->input('text'));
            $data_tomorrow = $this->getTomorrow($request->input('text'));
            return view('weather', compact('data_tomorrow', 'data_weather_bit', 'data_open_weather'));
        }
    }

    /**
     * Получить результат от всех сервисов 
     * GET запрос
     * @return void
     */
    public function showAllService()
    {
        $data_open_weather = $this->getOpenWeatherMap('Moscow');
        $data_weather_bit = $this->getWheatherBit('Moscow');
        // $data_tomorrow = $this->getTomorrow('Moscow');
        return view('weather', compact(
            'data_tomorrow',
            'data_weather_bit',
            'data_open_weather'
        ));
    }
}
