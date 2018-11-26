<?php


namespace TwitterApp\Repository;


use TwitterApp\Adapter\TweetAdapter;
use TwitterApp\Model\Tweet;
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

    /**
     * @param User $user
     * @param $limit
     * @return array
     */
    public function getTweetsFromUser(User $user, $limit)
    {
        return array_map(function ($value) {
            $tweetAdapter = new TweetAdapter($value);

            return $tweetAdapter->get()->toArray();

        }, $this->service->getTweetsFromUser($user, $limit));
    }


}