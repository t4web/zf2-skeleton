<?php

namespace Users;

return [
    'routes' => [
        'users' => [
            'type'    => 'Literal',
            'options' => [
                'route'    => '/users',
            ],
            'child_routes' => [
                'user' => [
                    'type'    => 'Literal',
                    'options' => [
                        'route'    => '/user',
                    ],
                    'child_routes' => [
                        'create-page' => [
                            'type'    => 'Literal',
                            'options' => [
                                'route'    => '/create-page',
                                'defaults' => [
                                    'controller' => 'sebaks-zend-mvc-controller',
                                    'allowedMethods' => ['GET'],
                                    'template' => 'users/user/create.phtml',
                                ],
                            ],
                        ],
                        'create' => [
                            'type'    => 'Literal',
                            'options' => [
                                'route'    => '/create',
                                'defaults' => [
                                    'controller' => 'sebaks-zend-mvc-controller',
                                    'allowedMethods' => ['POST'],
                                    'changesValidator' => 'Users\User\CreateChangesValidator',
                                    'service' => 'Users\User\CreateService',
                                    'template' => 'users/user/create.phtml',
                                    'redirectTo' => 'users/user/success',
                                ],
                            ],
                        ],
                        'read' => [
                            'type'    => 'Segment',
                            'options' => [
                                'route'    => '/read/:id',
                                'defaults' => [
                                    'controller' => 'sebaks-zend-mvc-controller',
                                    'allowedMethods' => ['GET'],
                                    'criteriaValidator' => 'Users\User\ReadCriteriaValidator',
                                    'service' => 'Users\User\ReadService',
                                    'viewModel' => 'Users\User\ReadViewModel',
                                    'template' => 'users/user/read.phtml',
                                    'routeCriteria' => ['id'],
                                ],
                            ],
                        ],
                        'update' => [
                            'type'    => 'Segment',
                            'options' => [
                                'route'    => '/update/:id',
                                'defaults' => [
                                    'controller' => 'sebaks-zend-mvc-controller',
                                    'allowedMethods' => ['POST'],
                                    'criteriaValidator' => 'Users\User\UpdateCriteriaValidator',
                                    'changesValidator' => 'Users\User\UpdateChangesValidator',
                                    'service' => 'Users\User\UpdateService',
                                    'template' => 'users/user/update.phtml',
                                    'redirectTo' => 'users/user/success',
                                ],
                            ],
                        ],
                        'delete' => [
                            'type'    => 'Segment',
                            'options' => [
                                'route'    => '/delete/:id',
                                'defaults' => [
                                    'controller' => 'sebaks-zend-mvc-controller',
                                    'allowedMethods' => ['GET'],
                                    'criteriaValidator' => 'Users\User\DeleteCriteriaValidator',
                                    'service' => 'Users\User\DeleteService',
                                    'redirectTo' => 'users/user/success',
                                ],
                            ],
                        ],
                        'success' => [
                            'type'    => 'Literal',
                            'options' => [
                                'route'    => '/success',
                                'defaults' => [
                                    'allowedMethods' => ['GET'],
                                    'controller' => 'sebaks-zend-mvc-controller',
                                    'template' => 'users/user/success.phtml',
                                ],
                            ],
                        ],
                        'list' => [
                            'type'    => 'Segment',
                            'options' => [
                                'route'    => '/list',
                                'defaults' => [
                                    'controller' => 'sebaks-zend-mvc-controller',
                                    'allowedMethods' => ['GET'],
                                    'criteriaValidator' => 'Users\User\ListCriteriaValidator',
                                    'service' => 'Users\User\ListService',
                                    'viewModel' => 'Users\User\ListViewModel',
                                    'template' => 'users/user/list.phtml',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'api' => [
            'type'    => 'Literal',
            'options' => [
                'route'    => '/api',
            ],
            'child_routes' => [
                'users' => [
                    'type'    => 'Literal',
                    'options' => [
                        'route'    => '/users',
                    ],
                    'child_routes' => [
                        'user' => [
                            'type'    => 'Literal',
                            'options' => [
                                'route'    => '/user',
                            ],
                            'child_routes' => [
                                'create' => [
                                    'type'    => 'Literal',
                                    'options' => [
                                        'route'    => '/create',
                                        'defaults' => [
                                            'controller' => 'sebaks-zend-mvc-api-controller',
                                            'allowedMethods' => ['POST'],
                                            'changesValidator' => 'Users\User\CreateChangesValidator',
                                            'service' => 'Users\User\CreateService',
                                        ],
                                    ],
                                ],
                                'read' => [
                                    'type'    => 'Segment',
                                    'options' => [
                                        'route'    => '/read/:id',
                                        'defaults' => [
                                            'controller' => 'sebaks-zend-mvc-api-controller',
                                            'allowedMethods' => ['GET'],
                                            'criteriaValidator' => 'Users\User\ReadCriteriaValidator',
                                            'service' => 'Users\User\ReadService',
                                        ],
                                    ],
                                ],
                                'update' => [
                                    'type'    => 'Segment',
                                    'options' => [
                                        'route'    => '/update/:id',
                                        'defaults' => [
                                            'controller' => 'sebaks-zend-mvc-api-controller',
                                            'allowedMethods' => ['POST'],
                                            'criteriaValidator' => 'Users\User\UpdateCriteriaValidator',
                                            'changesValidator' => 'Users\User\UpdateChangesValidator',
                                            'service' => 'Users\User\UpdateService',
                                        ],
                                    ],
                                ],
                                'delete' => [
                                    'type'    => 'Segment',
                                    'options' => [
                                        'route'    => '/delete/:id',
                                        'defaults' => [
                                            'controller' => 'sebaks-zend-mvc-api-controller',
                                            'allowedMethods' => ['POST'],
                                            'criteriaValidator' => 'Users\User\DeleteCriteriaValidator',
                                            'service' => 'Users\User\DeleteService',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],

        'admin-users-user-create-new' => [
            'type'    => 'Literal',
            'options' => [
                'route'    => '/admin/users/user/new',
                'defaults' => [
                    'controller' => 'sebaks-zend-mvc-controller',
                    'allowedMethods' => ['GET'],
                ],
            ],
        ],
        'admin-users-user-create' => [
            'type'    => 'Literal',
            'options' => [
                'route'    => '/admin/users/user/create',
                'defaults' => [
                    'controller' => 'sebaks-zend-mvc-controller',
                    'allowedMethods' => ['POST'],
                    'changesValidator' => 'Users\User\CreateChangesValidator',
                    'service' => 'Users\User\Service\Creator',
                    'redirectTo' => 'admin-users-user-list',
                ],
            ],
        ],
        'admin-users-user-read' => [
            'type'    => 'Segment',
            'options' => [
                'route'    => '/admin/users/user/read/:id',
                'defaults' => [
                    'controller' => 'sebaks-zend-mvc-controller',
                    'allowedMethods' => ['GET'],
                    'criteriaValidator' => 'Users\User\ReadCriteriaValidator',
                    'service' => 'Users\User\ReadService',
                    'routeCriteria' => 'id',
                ],
            ],
        ],
        'admin-users-user-update' => [
            'type'    => 'Segment',
            'options' => [
                'route'    => '/admin/users/user/update/:id',
                'defaults' => [
                    'controller' => 'sebaks-zend-mvc-controller',
                    'allowedMethods' => ['POST'],
                    'criteriaValidator' => 'Users\User\ReadCriteriaValidator',
                    'changesValidator' => 'Users\User\UpdateChangesValidator',
                    'service' => 'Users\User\Service\Updater',
                    'routeCriteria' => ['id'],
                    'redirectTo' => 'admin-users-user-list',
                ],
            ],
        ],
        'admin-users-user-delete' => [
            'type'    => 'Segment',
            'options' => [
                'route'    => '/admin/users/user/delete/:id',
                'defaults' => [
                    'controller' => 'sebaks-zend-mvc-controller',
                    'allowedMethods' => ['GET'],
                    'criteriaValidator' => 'Users\User\ReadCriteriaValidator',
                    'service' => 'Users\User\Service\Deleter',
                    'redirectTo' => 'admin-users-user-list',
                    'routeCriteria' => ['id'],
                ],
            ],
        ],
        'admin-users-user-delete-confirm' => [
            'type'    => 'Segment',
            'options' => [
                'route'    => '/admin/users/user/delete/:id/confirm',
                'defaults' => [
                    'controller' => 'sebaks-zend-mvc-controller',
                    'allowedMethods' => ['GET'],
                    'criteriaValidator' => 'Users\User\ReadCriteriaValidator',
                    'routeCriteria' => ['id'],
                ],
            ],
        ],
        'admin-users-user-list' => [
            'type'    => 'Segment',
            'options' => [
                'route'    => '/admin/users/user/list',
                'defaults' => [
                    'controller' => 'sebaks-zend-mvc-controller',
                    'allowedMethods' => ['GET'],
                    'criteriaValidator' => 'Users\User\ListCriteriaValidator',
                    'service' => 'Users\User\ListService',
                ],
            ],
        ],
    ],
];
