<?php

namespace TwitterApp\Service;

use Psr\Log\LoggerInterface;

class Service
{
    protected $client;

    protected $logger;

    public function __construct($client, LoggerInterface $logger)
    {
        $this->logger = $logger;
        $this->client = $client;
    }
}