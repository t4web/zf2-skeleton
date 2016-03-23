<?php

namespace Comments;

return [
    'contents' => [
        'admin-comments-comment-list' => [
            'layout' => 'admin',
            'extend' => 't4web-admin-list',
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
                                'column-user' => [
                                    'template' => 't4web-admin/list-table-head-column',
                                    'variables' => [
                                        'fieldName' => 'User',
                                        'style' => 'width: 20%',
                                    ],
                                ],
                                'column-text' => [
                                    'template' => 't4web-admin/list-table-head-column',
                                    'variables' => [
                                        'fieldName' => 'Text',
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
                                'readRoute' => 'admin-comments-comment-list',
                                'deleteRoute' => 'admin-comments-comment-list',
                            ],
                            'pre-load' => [
                                'user' => [
                                    'field' => 'userId',
                                    'repository' => 'Users\User\Infrastructure\Repository',
                                ],
                            ],
                            'children' => [
                                'column-id' => [
                                    'extend' => 't4web-admin-list-table-row-column',
                                    'variables' => [
                                        'field' => 'id',
                                    ],
                                ],
                                'column-user' => [
                                    'template' => 'users/user/block/list-table-row-column-user',
                                    'variables' => [
                                        'field' => 'user',
                                    ],
                                ],
                                'column-text' => [
                                    'extend' => 't4web-admin-list-table-row-column-value-label',
                                    'variables' => [
                                        'field' => 'text',
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
        'admin-comments-comment-create-new' => [
            'layout' => 'admin',
            'extend' => 't4web-admin-create',
            'variables' => [
                'title' => 'Create user',
                'submitRoute' => 'admin-comments-comment-create',
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
        'admin-comments-comment-create' => [
            'layout' => 'admin',
            'extend' => 't4web-admin-create',
            'variables' => [
                'title' => 'Create user',
                'submitRoute' => 'admin-comments-comment-create',
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
        'admin-comments-comment-read' => [
            'layout' => 'admin',
            'extend' => 't4web-admin-read',
            'variables' => [
                'title' => 'Read user',
            ],
            'children' => [
                'form' => 'comments-comment-edit-form'
            ],
        ],
        'admin-comments-comment-update' => [
            'layout' => 'admin',
            'extend' => 't4web-admin-update',
            'variables' => [
                'title' => 'Update user',
            ],
            'children' => [
                'form' => 'comments-comment-edit-form'
            ],
        ],
        'admin-comments-comment-delete-confirm' => [
            'layout' => 'admin',
            'template' => 't4web-admin/entity-delete-confirm',
            'variables' => [
                'listRoute' => 'admin-comments-comment-list',
                'deleteRoute' => 'admin-comments-comment-delete',
            ],
        ],
    ],
    'blocks' => [
        'comments-comment-edit-form' => [
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
                'submitRoute' => 'admin-comments-comment-update',
                'cancelRoute' => 'admin-comments-comment-list',
                'submitText' => 'Save',
            ],
        ],
    ],
];
