<?php

namespace TwitterApp\Service\Twitter;

use GuzzleHttp\Exception\RequestException;
use TwitterApp\Adapter\TwitterResponseAdapter;
use TwitterApp\Model\User;
use TwitterApp\Service\Service;

class TwitterServiceImpl extends Service implements TwitterService
{
    /**
     * @param User $user
     * @return array
     */
    public function getTweetsFromUser(User $user, $limit)
    {
        $response = $this->client->get('statuses/user_timeline', [
            'user_id' => $user->getId(),
            'count' => $limit
        ]);

        $adapter = new TwitterResponseAdapter($response);

        return $adapter->toArray();
    }
}