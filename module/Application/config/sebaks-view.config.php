<?php

return [
    'blocks' => [
        't4web-admin-sidebar-menu' => [
            'children' => [
                [
                    'extend' => 't4web-admin-sidebar-menu-item',
                    'variables' => [
                        'label' => 'Users',
                        'route' => 'admin-users-user-list',
                        'icon' => 'fa-users',
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
                [
                    'extend' => 't4web-admin-sidebar-menu-item',
                    'variables' => [
                        'label' => 'Comments',
                        'route' => 'admin-comments-comment-list',
                        'icon' => 'fa-comments',
                    ],
                ],
            ],
        ],
    ],
];
