<?php


namespace TwitterApp\Repository;

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

            return $this->mapToTweet($value)->toArray();

        }, $this->service->getTweetsFromUser($user, $limit));
    }

    /**
     * Transform tweet from TwitterResponseAdapter to TweetObject
     * @param $value
     * @return Tweet
     * @throws \Exception
     */
    private function mapToTweet($value)
    {
        $tweet = new Tweet($value['text']);

        $tweet->setCreatedAt(new \DateTime($value['created_at']));
        $tweet->setInReply(false);

        if ( ! is_null($value['in_reply']['id'] and ! is_null($value['in_reply']['name'])) ) {
            $tweet->setId($value['in_reply']['id']);
            $tweet->setName($value['in_reply']['name']);
        }

        return $tweet;
    }

}