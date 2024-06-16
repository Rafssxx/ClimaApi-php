<?php
class ApiService
{
    private $key = "Sua key da api";
    private $city;

    public function getKey()
    {
        return $this->key;
    }

    public function setCity($city)
    {
       $this-> city = $city;
    }

    public function getCity()
    {
        return $this->city;
    }
}
