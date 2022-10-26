<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lazy weather service</title>

</head>

<body>
    <input name="guruweba_example_search" type="search" />
    <div>
        <b>OpenWeatherMap:</b>
    </div>
    <div>
        <p>Город: {{ $weather_data['name'] ?? '' }}
        <p>
        <p>Температура: {{ $weather_data['main']['temp'] ?? '' }}
        <p>
        <p>Статус: {{ $weather_data['weather'][0]['description'] ?? '' }}
        <p>
        <p>Скорость ветра м/с: {{ $weather_data['wind']['speed'] ?? '' }}
        <p>
    </div>
    <div>
        <b>Weatherbit:</b>
    </div>
    <div>
        <p>Город: {{ $data_wea_bit['data'][0]['city_name'] ?? '' }}
        <p>
        <p>Температура: {{ $data_wea_bit['data'][0]['app_temp'] ?? '' }}
        <p>
        <p>Статус: {{ $data_wea_bit['data'][0]['weather']['description'] ?? '' }}
        <p>
        <p>Скорость ветра в м/c {{ $data_wea_bit['data'][0]['wind_spd'] ?? '' }}
        <p>
    </div>
    <div>
        <b>Tomorrow.io:</b>
    </div>
    <div>
        <p>Время сбора: {{$data_tomorrow["data"]["timelines"][0]["intervals"][0]["startTime"]}}
        <p>
        <p>Город: {{ $data->city ?? '' }}
        <p>
        <p>Температура: {{ $data_tomorrow["data"]["timelines"][0]["intervals"][0]["values"]["temperature"] ?? '' }}
        <p>
        <p>Статус: {{ $data_tomorrow["data"]["timelines"][0]["intervals"][0]["values"]["weatherCode"] ?? '' }}
        <p>
        <p>Скорость ветра в м/c {{ $data_tomorrow["data"]["timelines"][0]["intervals"][0]["values"]["windSpeed"] ?? '' }}
        <p>
    </div>
</body>

</html>
