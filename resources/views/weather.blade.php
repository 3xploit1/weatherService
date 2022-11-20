<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lazy weather service</title>
    <link rel="stylesheet" type="text/css" href="{{ url('css/main.css') }}">

</head>

<body>
    <nav class="navMenu">
        <a href="#">Home</a>
        <a href="#">Blog</a>
        <a href="#">Work</a>
        <a href="#">About</a>
        <div class="dot"></div>
    </nav>
    <div class="input_control">
        <form action="" method="post">
            @csrf
            <input type="text" name="text">
            <input type="submit">
        </form>
    </div>
    <div class="weather-content">
        <div class="title-owm">
            <h1>OpenWeatherMap</h1>
        </div>
        <div class="content-owm">
            <p>Город: {{ $data_open_weather['name'] ?? '' }}
            <p>
            <p>Температура: {{ $data_open_weather['main']['temp'] ?? '' }}
            <p>
            <p>Статус: {{ $data_open_weather['weather'][0]['description'] ?? '' }}
            <p>
            <p>Скорость ветра м/с: {{ $data_open_weather['wind']['speed'] ?? '' }}
            <p>
        </div>
        <div class="title-weabit">
            <h1>Weatherbit</h1>
        </div>
        <div class="content-weabit">
            <p>Город: {{ $data_weather_bit['data'][0]['city_name'] ?? '' }}
            <p>
            <p>Температура: {{ $data_weather_bit['data'][0]['app_temp'] ?? '' }}
            <p>
            <p>Статус: {{ $data_weather_bit['data'][0]['weather']['description'] ?? '' }}
            <p>
            <p>Скорость ветра в м/c {{ $data_weather_bit['data'][0]['wind_spd'] ?? '' }}
            <p>
        </div>
        <div class="title-tomorrow">
            <h1>Tomorrow</h1>
        </div>
        <div class="content-tomorrow">
            <p>Время сбора: {{ $data_tomorrow['data']['timelines'][0]['intervals'][0]['startTime'] ?? '' }}
            <p>
            <p>Температура: {{ $data_tomorrow['data']['timelines'][0]['intervals'][0]['values']['temperature'] ?? '' }}
            <p>
            <p>Статус: {{ $data_tomorrow['data']['timelines'][0]['intervals'][0]['values']['weatherCode'] ?? '' }}
            <p>
            <p>Скорость ветра в м/c:
                {{ $data_tomorrow['data']['timelines'][0]['intervals'][0]['values']['windSpeed'] ?? '' }}
            <p>
        </div>
    </div>
</body>
<footer>
    <div class="footer">
        <div class="row">
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
        <div class="row">
            develop by 3xploit1
            <p>
                <a target="_blank" rel="noopener noreferrer" href="https://github.com/3xploit1">github</a>
            </p>
        </div>
    </div>
</footer>

</html>
