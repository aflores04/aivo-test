<?php


namespace TwitterApp\Service\Twitter;


use TwitterApp\Model\User;

interface TwitterService
{

    public function getTweetFromUser(User $user);

}