<?php

namespace App\Http\Controllers;

use App\Models\OpenWeatherMap;
use App\Models\WheatherBit; 

class WeatherController extends Controller
{
    public function getOpenWeatherMap()
    {
        $data = new OpenWeatherMap('Киров');
        $weather_data = $data->setUrlOpenWeatherMap()->getJsonWeatherOpenWeatherMap();
        return view('weather', compact('weather_data'));
    }

    public function getWheatherBit()
    {
        $data = new WheatherBit('Moscow');
        $data_wea_bit = $data->setUrlWeatherBit()->getDataWeatherBit();
        return view('weather', compact('data_wea_bit'));
    }


}
