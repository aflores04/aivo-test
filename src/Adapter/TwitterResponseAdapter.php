<?php


namespace TwitterApp\Adapter;


use TwitterApp\Model\Tweet;

class TwitterResponseAdapter
{

    private $tweets;

    public function __construct($tweets)
    {
        $this->tweets = $tweets;
    }

    public function toArray()
    {
        $map = array_map(function ($value) {
            return [
                'created_at' => $value->created_at,
                'text' => $value->text,
                'in_reply' => [
                    'id' => $value->in_reply_to_user_id,
                    'name' => $value->in_reply_to_screen_name
                ]
            ];
        }, $this->tweets);

        return $map;
    }

}