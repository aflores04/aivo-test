<?php


namespace TwitterApp\Service;

use GuzzleHttp\ClientInterface;

class Service
{
    protected $client;

    public function __construct($client)
    {
        $this->client = $client;
    }
}