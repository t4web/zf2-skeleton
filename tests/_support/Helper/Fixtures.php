<?php
namespace Helper;

class Fixtures extends \Codeception\Module
{
    public function user($name)
    {
        $db = $this->getModule('Db');

        $userData = [
            'name' => $name,
            'status' => 1,
            'create_dt' => date('Y-m-d H:i:s'),
        ];

        $userData['id'] = $db->haveInDatabase('users', $userData);

        return $userData;
    }
}
