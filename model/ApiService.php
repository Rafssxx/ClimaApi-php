<?php
class ApiService
{
    private $key = "f67cdee6fc3b27f425eab09c52a019f8";
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
