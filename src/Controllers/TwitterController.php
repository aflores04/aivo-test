<?php

namespace TwitterApp\Controllers;

use Slim\Container;

/**
 * Class TwitterController
 * @package TwitterApp\Controllers
 */
class TwitterController extends Controller
{

    /**
     * @param $request
     * @param $response
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function index($request, $response)
    {
        $service = $this->getContainer()->get('TwitterService');
        
        $response->write($service->hola());
    }

}