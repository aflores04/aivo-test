<?php

namespace TwitterApp\Service\Twitter;

use GuzzleHttp\Exception\RequestException;
use TwitterApp\Model\User;
use TwitterApp\Service\Service;

class TwitterServiceImpl extends Service implements TwitterService
{
    /**
     * @param User $user
     */
    public function getTweetFromUser(User $user, $limit)
    {
        try {

            $response = $this->client->get('statuses/user_timeline', [
                'user_id' => $user->getId(),
                'count' => $limit
            ]);

            echo '<pre>';
            die(var_dump($response));

        } catch (RequestException $e)
        {
            die(var_dump($e->getMessage()));
        }
    }
}