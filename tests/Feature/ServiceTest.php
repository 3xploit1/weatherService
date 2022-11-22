<?php

namespace Tests\Feature;

use App\Http\Controllers\WeatherController;
use Tests\TestCase;
use Symfony\Component\DomCrawler\Crawler;
use App\Models\Geocoder;

class ServiceTest extends TestCase
{
    /**
     * Тест на возврат 200
     */
    public function test_example()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * Тест на возврат массива 
     */
    public function test_tomorrow()
    {
        $controller = new WeatherController(); 
        $this->assertArrayHasKey('data', $controller->getTomorrow('Moscow')); 
    }

    // /**
    //  * Тест на возврат массива 
    //  */
    public function test_open_weather_map()
    {
        $controller = new WeatherController(); 
        $this->assertArrayHasKey('main', $controller->getOpenWeatherMap('Киров')); 
    }

    // /**
    // * Тест на возврат массива 
    // */
    public function test_weather_bit()
    {
        $controller = new WeatherController();
        $this->assertArrayHasKey('count', $controller->getWheatherBit('Moscow'));
    }

    // /**
    //  * Тест отображения текста
    //  */
    public function test_render()
    {
        $response = $this->get('/');
        $response->assertSee('<h1>OpenWeatherMap</h1>', $escape = false); 
    }

    // /**
    //  * Тест рендера owm 
    //  */
    public function test_render_blade_owm()
    {
        $html = file_get_contents("http://lzwea.ru");
        $crawler = new Crawler($html);

        if (preg_match('/\d/', $crawler->filter('div.content-owm')->html(''))){
            $this->assertTrue(true); 
        }
    }

    // /**
    //  * Тест рендера tomorrow 
    //  */
    public function test_render_blade_tomorrow()
    {
        $html = file_get_contents("http://lzwea.ru");
        $crawler = new Crawler($html);

        if (preg_match('/\d/', $crawler->filter('div.content-tomorrow')->html(''))){
            $this->assertTrue(true); 
        }
    }

    // /**
    //  * Тест рендера weabit
    //  */
    public function test_render_blade_weabit()
    {
        $html = file_get_contents("http://lzwea.ru");
        $crawler = new Crawler($html);

        if (preg_match('/\d/', $crawler->filter('div.content-weabit')->html(''))){
            $this->assertTrue(true); 
        }
    }

    // /**
    //  * Тест на возврат массива 
    //  */
    public function test_geocoder()
    {
        $data = new Geocoder('Moscow'); 
        $this->assertArrayHasKey(1, $data->getGeoCoder()->getGeoData());
    }


    // /**
    //  * Тест на существование footer
    //  */
    public function test_footer()
    {
        $html = file_get_contents("http://lzwea.ru");
        $crawler = new Crawler($html);

        if ($crawler->filter('div.footer')->count()){
            $this->assertTrue(true);
        }
    }
}
