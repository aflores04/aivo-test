<?php


namespace TwitterApp\Model;


class User
{

    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

}