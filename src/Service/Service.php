<?php


namespace TwitterApp\Service;

use GuzzleHttp\ClientInterface;

class Service
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * TwitterServiceImpl constructor.
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }
}