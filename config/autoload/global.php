<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

use Zend\Db\Adapter\AdapterServiceFactory;
use Zend\Db\TableGateway\Feature\GlobalAdapterFeature;

// Определение запросов от Codeception
// если это он, то подставим тестовую базу
$dbname = 'skeleton';
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'Codeception') {
    $dbname = 'skeleton_test';
}

return [
    'db' => [
        'driver' => 'Pdo',
        'dsn' => "mysql:dbname=$dbname;host=localhost",
        'username' => 'skeleton',
        'password' => '111',
    ],

    'service_manager' => [
        'factories' => [
            'Zend\Db\Adapter\Adapter' => function ($serviceManager) {
                $adapterFactory = new AdapterServiceFactory();
                $adapter = $adapterFactory->createService($serviceManager);
                GlobalAdapterFeature::setStaticAdapter($adapter);

                return $adapter;
            },
        ],
    ],
    'view_manager' => [
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],
];
