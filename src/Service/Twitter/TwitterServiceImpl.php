<?php

namespace TwitterApp\Service\Twitter;

use GuzzleHttp\Exception\RequestException;
use Psr\Log\LoggerInterface;
use TwitterApp\Adapter\ArrayAdapter;
use TwitterApp\Adapter\TwitterResponseAdapter;
use TwitterApp\Model\User;
use TwitterApp\Service\Service;

class TwitterServiceImpl extends Service implements TwitterService
{

    /**
     * @var ArrayAdapter
     */
    private $adapter;

    /**
     * TwitterServiceImpl constructor.
     * @param $client
     * @param LoggerInterface $logger
     * @param ArrayAdapter $adapter
     */
    public function __construct($client, LoggerInterface $logger, ArrayAdapter $adapter)
    {
        $this->adapter = $adapter;
        parent::__construct($client, $logger);
    }

    /**
     * @param User $user
     * @param $limit
     * @return array
     */
    public function getTweetsFromUser(User $user, $limit)
    {
        $response = $this->client->get('statuses/user_timeline', [
            'user_id' => $user->getId(),
            'count' => $limit
        ]);

        # log errors
        if ($response->errors) {
            foreach ($response->errors as $error)
                $this->logger->warning($error->message);
        }

        return $this->adapter->toArray($response);
    }
}