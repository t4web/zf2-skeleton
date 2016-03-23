<?php

namespace Comments;

return [
    'routes' => [
        'admin-comments-comment-list' => [
            'type'    => 'Segment',
            'options' => [
                'route'    => '/admin/comments/comment/list',
                'defaults' => [
                    'controller' => 'sebaks-zend-mvc-controller',
                    'allowedMethods' => ['GET'],
                    'service' => Comment\ListService::class,
                    'template' => 'comments/comment/list.phtml',
                    'viewAssembler' => Comment\ViewAssembler::class,
                ],
            ],
        ],
    ],
];
