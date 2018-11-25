<?php

namespace TwitterApp\Service\Twitter;

use TwitterApp\Model\User;
use TwitterApp\Service\Service;

class TwitterServiceImpl extends Service implements TwitterService
{
    /**
     * @param User $user
     */
    public function getTweetFromUser(User $user, $limit)
    {
        return 'hello world';
    }
}