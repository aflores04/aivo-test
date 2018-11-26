<?php

namespace TwitterApp\Model;

use http\Exception\InvalidArgumentException;

class Tweet
{

    const TWEETS_LIMIT = 10;

    /**
     * @var \DateTime
     */
    private $created_at;

    private $text;

    private $id;

    /**
     * user name
     * @var string
     */
    private $name;

    /**
     * is in reply of an user
     * @var bool
     */
    private $in_reply = false;

    public function __construct($text = '')
    {
        $this->text = $text;
    }

    public function toArray()
    {
        $tweet = [
            'created_at' => $this->getCreatedAt(),
            'text' => $this->getText()
        ];

        if ($this->isInReply())
            $tweet['in_reply'] = [
                    'id' => $this->getId(),
                    'name' => $this->getName()
                ];

        return $tweet;
    }

    /**
     * @param $in_reply
     * @throws \Exception
     */
    public function setInReply($in_reply)
    {
        if (is_bool($in_reply)) {
            $this->in_reply = $in_reply;
        } else {
            throw new \Exception('in_reply most be of type boolean');
        }
    }
    
    public function isInReply()
    {
        return $this->in_reply;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param \DateTime $created_at
     */
    public function setCreatedAt(\DateTime $created_at)
    {
        $this->created_at = $created_at->format('D M d H:i:s O Y');
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

}