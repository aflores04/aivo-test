<?php


namespace TwitterApp\Repository;


use TwitterApp\Model\User;
use TwitterApp\Service\Twitter\TwitterService;

class TwitterRepositoryImpl implements TwitterRepository
{

    /**
     * @var TwitterService
     */
    private $service;

    /**
     * TwitterRepositoryImpl constructor.
     * @param TwitterService $service
     */
    public function __construct(TwitterService $service)
    {
        $this->service = $service;
    }

    public function getTweetsFromUser(User $user, $limit)
    {
        return $this->service->getTweetFromUser($user, $limit);
    }
}