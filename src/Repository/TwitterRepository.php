<?php


namespace TwitterApp\Repository;


use TwitterApp\Model\User;

interface TwitterRepository
{
    public function getTweetsFromUser(User $user, $limit);
}