<?php


namespace TwitterApp\Service\Twitter;


use TwitterApp\Model\User;

interface TwitterService
{

    public function getTweetsFromUser(User $user, $limit);

}