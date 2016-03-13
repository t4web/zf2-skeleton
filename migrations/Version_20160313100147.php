<?php

namespace T4web\Migrations;

use T4web\Migrations\Migration\AbstractMigration;

class Version_20160313100147 extends AbstractMigration
{
    public static $description = "Set inactive user which not update yourself";

    public function up()
    {
        /** @var \Zend\Db\ResultSet\ResultSet $result */
        $result = $this->executeQuery('SELECT * FROM users WHERE update_dt IS NULL');

        foreach($result as $user) {
            $this->executeQuery('UPDATE users SET status = 2 WHERE id = ' . $user['id']);
            @unlink(__DIR__ . '/../public/data/' . $user['id'] . '/avatar.jpg');

            // remove unused cache
            //$userCache = $this->getServiceLocator('User\Repository\Cache');
            //$userCache->clearById($user['id']);
        }
    }

    public function down()
    {
        //throw new \RuntimeException('No way to go down!');
        //$this->executeQuery(/*Sql instruction*/);
    }
}