<?php

namespace Comments;

return [
    'router' => require_once 'router.config.php',
    'sebaks-view' => require_once 'sebaks-view.config.php',

    'service_manager' => [
        'factories' => [
            Comment\ListService::class => Comment\ListServiceFactory::class,
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],

    'entity_map' => [
        'Comment' => [
            'table' => 'comments',
            'entityClass' => 'Comments\Comment\Comment',
            'primaryKey' => 'id',
            'columnsAsAttributesMap' => [
                'id' => 'id',
                'user_id' => 'userId',
                'create_dt' => 'dateCreate',
                'update_dt' => 'dateUpdate',
                'text' => 'text',
                'user' => 'user',
            ],
            'criteriaMap' => [
                'id' => 'id_equalTo'
            ],
            'relations' => [
                'User' => ['comments.user_id', 'users.id']
            ],
        ],
    ],
];
