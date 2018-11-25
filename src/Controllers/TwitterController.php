<?php

namespace TwitterApp\Controllers;

use Slim\Container;
use TwitterApp\Model\User;
use TwitterApp\Repository\TwitterRepository;

/**
 * Class TwitterController
 * @package TwitterApp\Controllers
 */
class TwitterController extends Controller
{

    protected $repository;

    public function __construct(Container $container, TwitterRepository $repository)
    {
        $this->repository = $repository;
        parent::__construct($container);
    }

    /**
     * @param $request
     * @param $response
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function index($request, $response)
    {
        $service = $this->getContainer()->get('TwitterService');

        $user = new User('hola');
        
        $response->write($this->repository->getTweetsFromUser($user, 10));
    }

}