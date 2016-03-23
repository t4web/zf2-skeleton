<?php

namespace Users;

return [
    'router' => require_once 'router.config.php',

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
        ],
    ],

    'service_manager' => [
        'abstract_factories' => [
        ],
        'factories' => [
            'Users\User\ReadService' => 'Users\User\ReadServiceFactory',
            'Users\User\EntityExistValidator' => 'Users\User\EntityExistValidatorFactory',
            'Users\User\ReadCriteriaValidator' => 'Users\User\ReadCriteriaValidatorFactory',
            'Users\User\ListService' => 'Users\User\ListServiceFactory',
            'Users\User\ListViewModel' => 'Users\User\ListViewModelFactory',
        ],
        'invokables' => [
            'Users\User\CreateChangesValidator' => 'Users\User\CreateChangesValidator',
            'Users\User\ReadViewModel' => 'Users\User\ReadViewModel',
            'Users\User\UpdateCriteriaValidator' => 'Users\User\UpdateCriteriaValidator',
            'Users\User\UpdateChangesValidator' => 'Users\User\UpdateChangesValidator',
            'Users\User\DeleteCriteriaValidator' => 'Users\User\DeleteCriteriaValidator',
            'Users\User\ListCriteriaValidator' => 'Users\User\ListCriteriaValidator',
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],

    'entity_map' => [
        'User' => [
            'table' => 'users',
            'entityClass' => 'Users\User\User',
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
];
