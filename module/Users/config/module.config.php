<?php

namespace Users;

return array(
    'router' => array(
        'routes' => array(
            'users' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/users',
                ),
                'child_routes' => array(
                    'user' => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => '/user',
                        ),
                        'child_routes' => array(
                            'create-page' => array(
                                'type'    => 'Literal',
                                'options' => array(
                                    'route'    => '/create-page',
                                    'defaults' => array(
                                        'controller' => 'sebaks-zend-mvc-controller',
                                        'allowedMethods' => ['GET'],
                                        'template' => 'users/user/create.phtml',
                                    ),
                                ),
                            ),
                            'create' => array(
                                'type'    => 'Literal',
                                'options' => array(
                                    'route'    => '/create',
                                    'defaults' => array(
                                        'controller' => 'sebaks-zend-mvc-controller',
                                        'allowedMethods' => ['POST'],
                                        'changesValidator' => 'Users\User\CreateChangesValidator',
                                        'service' => 'Users\User\CreateService',
                                        'template' => 'users/user/create.phtml',
                                        'redirectTo' => 'users/user/success',
                                    ),
                                ),
                            ),
                            'read' => array(
                                'type'    => 'Segment',
                                'options' => array(
                                    'route'    => '/read/:id',
                                    'defaults' => array(
                                        'controller' => 'sebaks-zend-mvc-controller',
                                        'allowedMethods' => ['GET'],
                                        'criteriaValidator' => 'Users\User\ReadCriteriaValidator',
                                        'service' => 'Users\User\ReadService',
                                        'viewModel' => 'Users\User\ReadViewModel',
                                        'template' => 'users/user/read.phtml',
                                        'routeCriteria' => ['id'],
                                    ),
                                ),
                            ),
                            'update' => array(
                                'type'    => 'Segment',
                                'options' => array(
                                    'route'    => '/update/:id',
                                    'defaults' => array(
                                        'controller' => 'sebaks-zend-mvc-controller',
                                        'allowedMethods' => ['POST'],
                                        'criteriaValidator' => 'Users\User\UpdateCriteriaValidator',
                                        'changesValidator' => 'Users\User\UpdateChangesValidator',
                                        'service' => 'Users\User\UpdateService',
                                        'template' => 'users/user/update.phtml',
                                        'redirectTo' => 'users/user/success',
                                    ),
                                ),
                            ),
                            'delete' => array(
                                'type'    => 'Segment',
                                'options' => array(
                                    'route'    => '/delete/:id',
                                    'defaults' => array(
                                        'controller' => 'sebaks-zend-mvc-controller',
                                        'allowedMethods' => ['GET'],
                                        'criteriaValidator' => 'Users\User\DeleteCriteriaValidator',
                                        'service' => 'Users\User\DeleteService',
                                        'redirectTo' => 'users/user/success',
                                    ),
                                ),
                            ),
                            'success' => array(
                                'type'    => 'Literal',
                                'options' => array(
                                    'route'    => '/success',
                                    'defaults' => array(
                                        'allowedMethods' => ['GET'],
                                        'controller' => 'sebaks-zend-mvc-controller',
                                        'template' => 'users/user/success.phtml',
                                    ),
                                ),
                            ),
                            'list' => array(
                                'type'    => 'Segment',
                                'options' => array(
                                    'route'    => '/list',
                                    'defaults' => array(
                                        'controller' => 'sebaks-zend-mvc-controller',
                                        'allowedMethods' => ['GET'],
                                        'criteriaValidator' => 'Users\User\ListCriteriaValidator',
                                        'service' => 'Users\User\ListService',
                                        'viewModel' => 'Users\User\ListViewModel',
                                        'template' => 'users/user/list.phtml',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'api' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/api',
                ),
                'child_routes' => array(
                    'users' => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => '/users',
                        ),
                        'child_routes' => array(
                            'user' => array(
                                'type'    => 'Literal',
                                'options' => array(
                                    'route'    => '/user',
                                ),
                                'child_routes' => array(
                                    'create' => array(
                                        'type'    => 'Literal',
                                        'options' => array(
                                            'route'    => '/create',
                                            'defaults' => array(
                                                'controller' => 'sebaks-zend-mvc-api-controller',
                                                'allowedMethods' => ['POST'],
                                                'changesValidator' => 'Users\User\CreateChangesValidator',
                                                'service' => 'Users\User\CreateService',
                                            ),
                                        ),
                                    ),
                                    'read' => array(
                                        'type'    => 'Segment',
                                        'options' => array(
                                            'route'    => '/read/:id',
                                            'defaults' => array(
                                                'controller' => 'sebaks-zend-mvc-api-controller',
                                                'allowedMethods' => ['GET'],
                                                'criteriaValidator' => 'Users\User\ReadCriteriaValidator',
                                                'service' => 'Users\User\ReadService',
                                            ),
                                        ),
                                    ),
                                    'update' => array(
                                        'type'    => 'Segment',
                                        'options' => array(
                                            'route'    => '/update/:id',
                                            'defaults' => array(
                                                'controller' => 'sebaks-zend-mvc-api-controller',
                                                'allowedMethods' => ['POST'],
                                                'criteriaValidator' => 'Users\User\UpdateCriteriaValidator',
                                                'changesValidator' => 'Users\User\UpdateChangesValidator',
                                                'service' => 'Users\User\UpdateService',
                                            ),
                                        ),
                                    ),
                                    'delete' => array(
                                        'type'    => 'Segment',
                                        'options' => array(
                                            'route'    => '/delete/:id',
                                            'defaults' => array(
                                                'controller' => 'sebaks-zend-mvc-api-controller',
                                                'allowedMethods' => ['POST'],
                                                'criteriaValidator' => 'Users\User\DeleteCriteriaValidator',
                                                'service' => 'Users\User\DeleteService',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),

            'admin-users-user-create-new' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/admin/users/user/new',
                    'defaults' => array(
                        'controller' => 'sebaks-zend-mvc-controller',
                        'allowedMethods' => ['GET'],
                    ),
                ),
            ),
            'admin-users-user-create' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/admin/users/user/create',
                    'defaults' => array(
                        'controller' => 'sebaks-zend-mvc-controller',
                        'allowedMethods' => ['POST'],
                        'changesValidator' => 'Users\User\CreateChangesValidator',
                        'service' => 'Users\User\Service\Creator',
                        'redirectTo' => 'admin-users-user-list',
                    ),
                ),
            ),
            'admin-users-user-read' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/admin/users/user/read/:id',
                    'defaults' => array(
                        'controller' => 'sebaks-zend-mvc-controller',
                        'allowedMethods' => ['GET'],
                        'criteriaValidator' => 'Users\User\ReadCriteriaValidator',
                        'service' => 'Users\User\ReadService',
                        'routeCriteria' => 'id',
                    ),
                ),
            ),
            'admin-users-user-update' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/admin/users/user/update/:id',
                    'defaults' => array(
                        'controller' => 'sebaks-zend-mvc-controller',
                        'allowedMethods' => ['POST'],
                        'criteriaValidator' => 'Users\User\ReadCriteriaValidator',
                        'changesValidator' => 'Users\User\UpdateChangesValidator',
                        'service' => 'Users\User\Service\Updater',
                        'routeCriteria' => ['id'],
                        'redirectTo' => 'admin-users-user-list',
                    ),
                ),
            ),
            'admin-users-user-delete' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/admin/users/user/delete/:id',
                    'defaults' => array(
                        'controller' => 'sebaks-zend-mvc-controller',
                        'allowedMethods' => ['GET'],
                        'criteriaValidator' => 'Users\User\ReadCriteriaValidator',
                        'service' => 'Users\User\Service\Deleter',
                        'redirectTo' => 'admin-users-user-list',
                        'routeCriteria' => ['id'],
                    ),
                ),
            ),
            'admin-users-user-delete-confirm' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/admin/users/user/delete/:id/confirm',
                    'defaults' => array(
                        'controller' => 'sebaks-zend-mvc-controller',
                        'allowedMethods' => ['GET'],
                        'criteriaValidator' => 'Users\User\ReadCriteriaValidator',
                        'routeCriteria' => ['id'],
                    ),
                ),
            ),
            'admin-users-user-list' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/admin/users/user/list',
                    'defaults' => array(
                        'controller' => 'sebaks-zend-mvc-controller',
                        'allowedMethods' => ['GET'],
                        'criteriaValidator' => 'Users\User\ListCriteriaValidator',
                        'service' => 'Users\User\ListService',
                    ),
                ),
            ),
        ),
    ),
    'sebaks-view' => [
        'layouts' => [
        ],
        'contents' => [
            'admin-users-user-list' => [
                'layout' => 'admin',
                'extend' => 't4web-admin-list',
                'variables' => [
                    'createNewRoute' => 'admin-users-user-create-new'
                ],
                'children' => [
                    'filter' => [
                        'extend' => 't4web-admin-list-filter',
                        'children' => [
                            'element-name' => [
                                'extend' => 't4web-admin-form-element-text',
                                'variables' => [
                                    'label' => 'Name',
                                    'name' => 'name_like',
                                    'class' => 'col-md-6',
                                ],
                            ],
                            'element-id' => [
                                'extend' => 't4web-admin-form-element-text',
                                'variables' => [
                                    'label' => 'Id',
                                    'name' => 'id_equalTo',
                                    'class' => 'col-md-6'
                                ],
                            ],
                        ],
                    ],
                    'table' => [
                        'extend' => 't4web-admin-list-table',
                        'children' => [
                            'table-head' => [
                                'extend' => 't4web-admin-list-table-head',
                                'children' => [
                                    'column-id' => [
                                        'template' => 't4web-admin/list-table-head-column',
                                        'variables' => [
                                            'fieldName' => '#',
                                            'style' => 'width: 50px',
                                        ],
                                    ],
                                    'column-name' => [
                                        'template' => 't4web-admin/list-table-head-column',
                                        'variables' => [
                                            'fieldName' => 'Name',
                                            'style' => 'width: 20%',
                                        ],
                                    ],
                                    'column-status' => [
                                        'template' => 't4web-admin/list-table-head-column',
                                        'variables' => [
                                            'fieldName' => 'Status',
                                            'style' => 'width: 20%',
                                        ],
                                    ],
                                    'column-date-create' => [
                                        'template' => 't4web-admin/list-table-head-column',
                                        'variables' => [
                                            'fieldName' => 'Date create',
                                            'style' => 'width: 20%',
                                        ],
                                    ],
                                    'column-date-update' => [
                                        'template' => 't4web-admin/list-table-head-column',
                                        'variables' => [
                                            'fieldName' => 'Date update',
                                            'style' => 'width: 20%',
                                        ],
                                    ],
                                ],
                            ],
                            'table-row' => [
                                'extend' => 't4web-admin-list-table-row',
                                'variables' => [
                                    'readRoute' => 'admin-users-user-read',
                                    'deleteRoute' => 'admin-users-user-delete-confirm',
                                ],
                                'children' => [
                                    'column-id' => [
                                        'extend' => 't4web-admin-list-table-row-column',
                                        'variables' => [
                                            'field' => 'id',
                                        ],
                                    ],
                                    'column-name' => [
                                        'extend' => 't4web-admin-list-table-row-column',
                                        'variables' => [
                                            'field' => 'name',
                                        ],
                                    ],
                                    'column-status' => [
                                        'extend' => 't4web-admin-list-table-row-column-value-label',
                                        'variables' => [
                                            'field' => 'status',
                                            'classMap' => [
                                                \Users\User\Status::ACTIVE => 'success',
                                                \Users\User\Status::DELETED => 'danger',
                                                \Users\User\Status::BLOCKED => 'warning',
                                            ],
                                            'textMap' => [
                                                \Users\User\Status::ACTIVE => 'Active',
                                                \Users\User\Status::DELETED => 'Deleted',
                                                \Users\User\Status::BLOCKED => 'Blocked',
                                            ],
                                        ],
                                    ],
                                    'column-date-create' => [
                                        'extend' => 't4web-admin-list-table-row-column',
                                        'variables' => [
                                            'field' => 'dateCreate',
                                        ],
                                    ],
                                    'column-date-update' => [
                                        'extend' => 't4web-admin-list-table-row-column',
                                        'variables' => [
                                            'field' => 'dateUpdate',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'paginator' => [
                        'extend' => 't4web-admin-list-paginator',
                        'viewModel' => 'Users\User\ViewModel\Paginator',
                    ],
                ],
            ],
            'admin-users-user-create-new' => [
                'layout' => 'admin',
                'extend' => 't4web-admin-create',
                'variables' => [
                    'title' => 'Create user',
                    'submitRoute' => 'admin-users-user-create',
                ],
                'children' => [
                    'form' => [
                        'extend' => 't4web-admin-form',
                        'children' => [
                            'element-name' => [
                                'extend' => 't4web-admin-form-element-text',
                                'variables' => [
                                    'name' => 'name',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            'admin-users-user-create' => [
                'layout' => 'admin',
                'extend' => 't4web-admin-create',
                'variables' => [
                    'title' => 'Create user',
                    'submitRoute' => 'admin-users-user-create',
                ],
                'children' => [
                    'form' => [
                        'extend' => 't4web-admin-form',
                        'children' => [
                            'element-name' => [
                                'extend' => 't4web-admin-form-element-text',
                                'variables' => [
                                    'name' => 'name',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            'admin-users-user-read' => [
                'layout' => 'admin',
                'extend' => 't4web-admin-read',
                'variables' => [
                    'title' => 'Read user',
                ],
                'children' => [
                    'form' => 'users-user-edit-form'
                ],
            ],
            'admin-users-user-update' => [
                'layout' => 'admin',
                'extend' => 't4web-admin-update',
                'variables' => [
                    'title' => 'Update user',
                ],
                'children' => [
                    'form' => 'users-user-edit-form'
                ],
            ],
            'admin-users-user-delete-confirm' => [
                'layout' => 'admin',
                'template' => 't4web-admin/entity-delete-confirm',
                'variables' => [
                    'listRoute' => 'admin-users-user-list',
                    'deleteRoute' => 'admin-users-user-delete',
                ],
            ],
        ],
        'blocks' => [
            'users-user-edit-form' => [
                'extend' => 't4web-admin-form',
                'children' => [
                    'element-name' => [
                        'extend' => 't4web-admin-form-element-text',
                        'variables' => [
                            'name' => 'name',
                        ],
                    ],
                    'element-status' => [
                        'extend' => 't4web-admin-form-element-select',
                        'variables' => [
                            'name' => 'status',
                            'options' => [
                                \Users\User\Status::ACTIVE => 'Active',
                                \Users\User\Status::DELETED => 'Deleted',
                                \Users\User\Status::BLOCKED => 'Blocked',
                            ],
                        ],
                    ],
                ],
                'variables' => [
                    'submitRoute' => 'admin-users-user-update',
                    'cancelRoute' => 'admin-users-user-list',
                    'submitText' => 'Save',
                ],
            ],
            't4web-admin-sidebar-menu' => [
                'children' => [
                    [
                        'extend' => 't4web-admin-sidebar-menu-item',
                        'variables' => [
                            'label' => 'Users',
                            'route' => 'admin-users-user-list',
                            'icon' => 'fa-th',
                        ],
                        'children' => [
                            [
                                'extend' => 't4web-admin-sidebar-treeview-menu-item',
                                'variables' => [
                                    'label' => 'List',
                                    'route' => 'admin-users-user-list',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],

    'service_manager' => array(
        'abstract_factories' => array(
        ),
        'factories' => array(
            'Users\User\ReadService' => 'Users\User\ReadServiceFactory',
            'Users\User\EntityExistValidator' => 'Users\User\EntityExistValidatorFactory',
            'Users\User\ReadCriteriaValidator' => 'Users\User\ReadCriteriaValidatorFactory',
            'Users\User\ListService' => 'Users\User\ListServiceFactory',
            'Users\User\ListViewModel' => 'Users\User\ListViewModelFactory',
        ),
        'invokables' => array(
            'Users\User\CreateChangesValidator' => 'Users\User\CreateChangesValidator',
            'Users\User\ReadViewModel' => 'Users\User\ReadViewModel',
            'Users\User\UpdateCriteriaValidator' => 'Users\User\UpdateCriteriaValidator',
            'Users\User\UpdateChangesValidator' => 'Users\User\UpdateChangesValidator',
            'Users\User\DeleteCriteriaValidator' => 'Users\User\DeleteCriteriaValidator',
            'Users\User\ListCriteriaValidator' => 'Users\User\ListCriteriaValidator',
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),

    'entity_map' => [
        'User' => [
            'table' => 'users',
            'primaryKey' => 'id',
            'sequence' => 'users_id_seq',
            'columnsAsAttributesMap' => [
                'id' => 'id',
                'name' => 'name',
                'create_dt' => 'dateCreate',
                'update_dt' => 'dateUpdate',
                'status' => 'status',
            ],
            'criteriaMap' => [
                'id' => 'id_equalTo'
            ]
        ],
    ],
);
