<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lazy weather service</title>
    <link rel="stylesheet" type="text/css" href="{{ url('css/info.css') }}">
</head>

<body>
    <header>
        <nav class="navMenu">
            <a href="{{ url('/info') }}">Погода</a>
            <a href="{{ url('/info/about') }}">Проект</a>
            <div class="dot"></div>
        </nav>
    </header>
    <div class="info-project">
        <p>
            Этот сервис предназначен для просмотра погодных переменных.<br>
            Сервис использует три популярных api для просмотра погоды:
        </p>
        <dt>OpenWeatherMap</dt>
        <dt>WeatherBit</dt>
        <dt>Tomorrow</dt>
        <dd>Это онлайн сервисы, которые предоставляют платный или бесплатный (ограниченный) доступ к данным о текущей
            погоде<br>
    </div>
    <footer>
        <div class="social-media">
            <div class="social github">
                <a href="https://github.com/3xploit1" target="_blank"><i class="fa fa-github fa-2x"></i></a>
            </div>
            <div class="social telegram">
                <a href="https://t.me/qwerty91113" target="_blank"><i class="fa fa-paper-plane fa-2x"></i></a>
            </div>
        </div>
    </footer>

</body>

</html>
