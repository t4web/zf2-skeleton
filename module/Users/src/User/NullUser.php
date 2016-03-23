<?php

namespace Users\User;

class NullUser extends User
{

    /**
     * @return string
     */
    public function getName()
    {
        return '';
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return 0;
    }

    /**
     * @return string
     */
    public function getDateCreate()
    {
        return '';
    }

    /**
     * @return string
     */
    public function getDateUpdate()
    {
        return '';
    }

}
