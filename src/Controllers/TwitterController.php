<?php

namespace TwitterApp\Controllers;

/**
 * Class TwitterController
 * @package TwitterApp\Controllers
 */
class TwitterController extends Controller
{
    /**
     * @param $request
     * @param $response
     */
    public function index($request, $response)
    {
        $response->write('hello');
    }

}