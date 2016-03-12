# ZF2 Skeleton. Admin Backend. Main Menu

For customize main menu, you can override `t4web-admin-sidebar-menu` for example in your `config/autoload/global.php`:

```php
'router' => [
    'routes' => [
        'users-list' => [
            'type' => 'Zend\Mvc\Router\Http\Literal',
            'options' => [
                'route'    => '/admin/users/list',
                'defaults' => [
                    'controller' => 'Application\Controller\Index',
                    'action'     => 'index',
                ],
            ],
        ],
    ],
],

'sebaks-view' => [
    'blocks' => [
        't4web-admin-sidebar-menu' => [
            'template' => 't4web-admin/sidebar-menu',
            'children' => [
                'users-menu-item' => [
                    'template' => 't4web-admin/sidebar-menu-item',
                    'variables' => [
                        'label' => 'Users',
                        'route' => 'users-list',
                        'icon' => 'fa-users',
                    ],
                ],
            ],
        ],
    ],
],
```

Result:
![Admin menu item](http://teamforweb.com/var/admin-menu-item.jpg)
