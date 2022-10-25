<?php

Class Geocoder
{
    public string $apiKeyGeoCoder; 
    public $geocoder; 
    public string $city; 

    public function __construct($city)
    {
        $this->apiKeyGeoCoder = env('GEOCODE_API_KEY'); 
        $this->city = $city;
    }

    public function getGeoCoder()
    {
        $this->geocoder = new \OpenCage\Geocoder\Geocoder($this->apiKeyGeoCoder);
        return $this; 
    }

    public function getGeoData()
    {
        $result = $this->geocoder->geocode($this->city); 
        return $result['status']['message'] == 'OK' ? $result : '';
    }
}