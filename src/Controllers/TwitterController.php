<?php

namespace TwitterApp\Controllers;

use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;
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
     * @return Response
     */
    public function index(Request $request, Response $response, $args)
    {
        $user = new User();

        // default tweet limits 10
        $limit = Tweet::TWEETS_LIMIT;

        # if id does not exists on the route or is a string
        if ( ! array_key_exists('id', $args) or ! is_numeric($args['id']))
            return $response->withJson(['error' => 'Invalid user ID'], 400);

        $user->setId($args['id']);

        if (array_key_exists('limit', $args))
            $limit = $args['limit'];

        if (is_null($this->repository->getTweetsFromUser($user, $limit)))
            return $response->withJson(['error' => 'User does not exist'], 400);

        return $response->withJson($this->repository->getTweetsFromUser($user, $limit), 200);
    }

}