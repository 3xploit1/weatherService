## Погода

Сервис предназначен для просмотра погодных переменных в определенном городе, используя 3 сервиса предоставляющих api.
Сервисы: 
- [OpenWeatherMap](https://openweathermap.org).
- [WheatherBit](https://www.weatherbit.io).
- [Tomorrow.io](https://www.tomorrow.io)

![example](https://user-images.githubusercontent.com/79741934/203237418-39ef07dc-97dd-4b6a-87d0-0d4067f09189.PNG)

## Используемые технологии 
- PHP
- Laravel
- Шабланизатор blade 
- Dom crawler 

## Установка  
`git clone https://github.com/3xploit1/lazyWeatherService.git`  
`cd lazyWeatherService`  
`composer install`   
добавить в .env переменнные, где token ваш api ключь полученный после регистрации на вышеуказанных сервисах:    
&emsp;&emsp;OWM_API_KEY='token'    
&emsp;&emsp;GEOCODE_API_KEY='token'    
&emsp;&emsp;WEATHERBIT_API_KEY='token'    
&emsp;&emsp;TOMORROW_API_KEY='token'    
`php artisan key:generate`  
`php artisan serve`    
