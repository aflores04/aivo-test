<?php

namespace TwitterApp\Controllers;

use Slim\Container;
use TwitterApp\Model\Tweet;
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
    public function index($request, $response, $args)
    {
        $user = new User();

        // default tweet limits 10
        $limit = Tweet::TWEETS_LIMIT;

        if (array_key_exists('id', $args))
            $user->setId($args['id']);

        if (array_key_exists('limit', $args))
            $limit = $args['limit'];

        $response->write($this->repository->getTweetsFromUser($user, $limit));
    }

}