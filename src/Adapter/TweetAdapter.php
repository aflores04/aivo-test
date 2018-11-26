<?php


namespace TwitterApp\Adapter;

use TwitterApp\Model\Tweet;

class TweetAdapter
{

    private $tweet;

    public function __construct($tweet)
    {
        $this->tweet = $tweet;
    }

    public function get()
    {
        $tweet = new Tweet($this->tweet['text']);

        $tweet->setCreatedAt(new \DateTime($this->tweet['created_at']));
        $tweet->setInReply(false);

        if ( ! is_null($this->tweet['in_reply']['id'] and ! is_null($this->tweet['in_reply']['name'])) ) {
            $tweet->setId($this->tweet['in_reply']['id']);
            $tweet->setName($this->tweet['in_reply']['name']);
        }

        return $tweet;
    }

}