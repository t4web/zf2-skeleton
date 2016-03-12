<?php

namespace Users\User;

use T4webDomain\Entity;

class User extends Entity
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $status;

    /**
     * @var string
     */
    protected $dateCreate;

    /**
     * @var string
     */
    protected $dateUpdate;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
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

    public function populate(array $array = [])
    {
        if ($this->id === null && empty($array['id'])) {

            if (empty($array['status'])) {
                $array['status'] = Status::ACTIVE;
            }
            if (empty($array['dateCreate'])) {
                $array['dateCreate'] = date('Y-m-d H:i:s');
            }
            if (isset($array['dateUpdate'])) {
                unset($array['dateUpdate']);
            }

        } elseif ($this->id !== null) {
            $array['dateUpdate'] = date('Y-m-d H:i:s');
        }

        parent::populate($array);
    }
}
