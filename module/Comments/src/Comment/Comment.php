<?php

namespace Comments\Comment;

use T4webDomain\Entity;
use Users\User\User;

class Comment extends Entity
{

    /**
     * @var string
     */
    protected $text;

    /**
     * @var int
     */
    protected $userId;

    /**
     * @var User
     */
    protected $user;

    /**
     * @var string
     */
    protected $dateCreate;

    /**
     * @var string
     */
    protected $dateUpdate;

    public function __construct(array $data = [], User $user = null)
    {
        parent::__construct($data);
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getDateCreate()
    {
        return $this->dateCreate;
    }

    /**
     * @return string
     */
    public function getDateUpdate()
    {
        return $this->dateUpdate;
    }

    /**
     * @param array $properties
     * @return array
     */
    public function extract(array $properties = [])
    {
        $data = parent::extract($properties);

        if (!is_null($this->user)) {
            $data['user'] = $this->user->extract();
        }

        return $data;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }
}
