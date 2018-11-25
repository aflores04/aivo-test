<?php

namespace TwitterApp\Controllers;

use Slim\Container;

class Controller
{

    /**
     * @var Container
     */
    private $container;

    /**
     * Controller constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

}