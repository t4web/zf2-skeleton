# ZF2 Skeleton. View

## Contents

- [Describe view config](#describe-view-config)
- [List](#list)
- [New](#new)
- [Edit](#edit)

See [sebaks\view](https://github.com/sebaks/view) for more information.  
For our view `sebaks\zend-vc-controller` will return that params:
- `result` => depends from action,
- `criteriaErrors` => error messages after criteria validation,
- `changesErrors` => error messages after changes validation,
- `criteria` => request criteria,
- `validCriteria` => only valid data from request criteria,
- `changes` => request data (for `create` and `update` actions),
- `validChanges` => only valid data from reqyest data (for `create` and `update` actions)

#### Describe view config

For viewing we must describe 5 content pages: list, new, create, read, update. Somwhere in you `module.config.php`:

```php
'sebaks-view' => [
  'contents' => [
    'admin-show-list' => [/*...*/],
    'admin-show-new' => [/*...*/],
    'admin-show-create' => [/*...*/],
    'admin-show-read' => [/*...*/],
    'admin-show-update' => [/*...*/],
  ],
],
```

#### List

```php
'admin-show-list' => [
    'extend' => 'admin-list',
    'data' => [
        'static' => [
            'title' => 'Shows',
            'icon' => 'fa-star',
        ],
    ],
    'children' => [
        'button-new-entity' => [
            'template' => 't4web-admin/block/page-head-link-button',
            'data' => [
                'static' => [
                    'text' => 'New test case',
                    'color' => 'primary',
                    'size' => 'xs',
                    'icon' => 'plus',
                    'routeName' => 'admin-show-new',
                ],
            ],
        ],
        'table' => [
            'template' => 't4web-admin/block/table',
            'viewModel' => \T4web\Admin\ViewModel\TableViewModel::class,
            'children' => [
                'table-head-row' => [
                    'template' => 't4web-admin/block/table-tr',
                    'data' => [
                        'fromParent' => 'rows',
                    ],
                    'children' => [
                        'table-th-id' => [
                            'template' => 't4web-admin/block/table-th',
                            'capture' => 'table-td',
                            'data' => [
                                'static' => [
                                    'value' => 'Id',
                                    'width' => '5%',
                                ],
                            ],
                        ],
                        'table-th-name' => [
                            'template' => 't4web-admin/block/table-th',
                            'capture' => 'table-td',
                            'data' => [
                                'static' => [
                                    'value' => 'Name',
                                    'width' => '75%',
                                ],
                            ],
                        ],
                        'table-th-actions' => [
                            'template' => 't4web-admin/block/table-th',
                            'capture' => 'table-td',
                            'data' => [
                                'static' => [
                                    'value' => 'Actions',
                                    'width' => '20%',
                                ],
                            ],
                        ],
                    ],
                ],
                'table-body-row' => [
                    'viewModel' => \T4web\Admin\ViewModel\TableRowViewModel::class,
                    'template' => 't4web-admin/block/table-tr',
                    'data' => [
                        'fromParent' => 'row',
                    ],
                    'children' => [
                        'table-td-id' => [
                            'template' => 't4web-admin/block/table-td',
                            'capture' => 'table-td',
                            'data' => [
                                'fromParent' => ['id' => 'value'],
                            ],
                        ],
                        'table-td-url' => [
                            'template' => 't4web-admin/block/table-td',
                            'capture' => 'table-td',
                            'data' => [
                                'fromParent' => ['name' => 'value'],
                            ],
                        ],
                        'table-td-buttons' => [
                            'template' => 't4web-admin/block/table-td-buttons',
                            'capture' => 'table-td',
                            'data' => [
                                'fromParent' => 'id',
                            ],
                            'children' => [
                                'link-button-edit' => [
                                    'viewModel' => \T4web\Admin\ViewModel\EditButtonViewModel::class,
                                    'template' => 't4web-admin/block/link-button',
                                    'capture' => 'button',
                                    'data' => [
                                        'static' => [
                                            'text' => 'Edit',
                                            'color' => 'primary',
                                            'size' => 'xs',
                                            'icon' => 'pencil',
                                            'routeName' => 'admin-show-read',
                                        ],
                                        'fromParent' => 'id',
                                    ],
                                ],
                                'link-button-delete' => [
                                    'viewModel' => \T4web\Admin\ViewModel\EditButtonViewModel::class,
                                    'template' => 't4web-admin/block/link-button-with-confirm',
                                    'capture' => 'button',
                                    'data' => [
                                        'static' => [
                                            'text' => 'Delete',
                                            'color' => 'danger',
                                            'size' => 'xs',
                                            'icon' => 'times',
                                            'routeName' => 'admin-show-delete',
                                        ],
                                        'fromParent' => 'id',
                                    ],
                                ],
                            ]
                        ],
                    ],
                ],
            ],
            'childrenDynamicLists' => [
                'table-body-row' => 'rowsData',
            ],
            'data' => [
                'static' => [
                ],
                'fromGlobal' => [
                    'result' => 'rowsData',
                ],
            ],
        ],
        'paginator' => [
            'extend' => 't4web-admin-paginator',
            'viewModel' => 'Shows\Show\ViewModel\PaginatorViewModel',
        ],
    ],
],
```

Willbe rendered as

![list page](http://teamforweb.com/var/view-01.jpg)

#### New

```php
'admin-show-new' => [
    'layout' => 'admin-layout',
    'template' => 't4web-admin/content/new',
    'data' => [
        'static' => [
            'title' => 'Create show',
            'icon' => 'fa-star',
        ],
    ],
    'children' => [
        'form' => [
            'extend' => 't4web-admin-form',
            'data' => [
                'static' => [
                    'actionRoute' => 'admin-show-create',
                    'enctype' => 'multipart/form-data',
                ],
            ],
            'children' => [
                'form-element-name' => [
                    'template' => 't4web-admin/block/form-element-text',
                    'capture' => 'form-element',
                    'data' => [
                        'static' => [
                            'name' => 'name',
                        ],
                        'fromParent' => [
                            'name' => 'value',
                            'changesErrors:name' => 'errors',
                        ],
                    ],
                ],
                'form-element-description' => [
                    'template' => 't4web-admin/block/form-element-textarea',
                    'capture' => 'form-element',
                    'data' => [
                        'static' => [
                            'name' => 'description',
                        ],
                        'fromParent' => [
                            'description' => 'value',
                            'changesErrors:description' => 'errors',
                        ],
                    ],
                ],
                'form-element-picture' => [
                    'template' => 't4web-admin/block/form-element-file',
                    'capture' => 'form-element',
                    'data' => [
                        'static' => [
                            'label' => 'Picture',
                            'name' => 'picture',
                        ],
                        'fromParent' => [
                            'picture' => 'value',
                            'changesErrors:picture' => 'errors',
                        ],
                    ],
                ],
                'form-button-cancel' => [
                    'data' => [
                        'static' => [
                            'routeName' => 'admin-show-list',
                            'text' => 'Cancel',
                        ],
                    ],
                ],
            ],
        ],
    ],
],
'admin-show-create' => [
      'extend' => 'admin-show-new',
      'children' => [
          'form' => [
              'viewModel' => \T4web\Admin\ViewModel\UpdateFormViewModel::class,
          ],
      ],
  ],
```

Willbe rendered as

![new page](http://teamforweb.com/var/view-02.jpg)

#### Edit

```php
'admin-show-read' => [
    'extend' => 'admin-show-new',
    'template' => 't4web-admin/content/read',
    'data' => [
        'static' => [
            'title' => 'Edit show',
            'icon' => 'fa-star',
        ],
    ],
    'children' => [
        'form' => [
            'data' => [
                'static' => [
                    'actionRoute' => 'admin-show-update',
                ],
            ],
        ],
    ],
  ],
  'admin-show-update' => [
    'extend' => 'admin-show-new',
    'data' => [
        'static' => [
            'title' => 'Edit show',
            'icon' => 'fa-star',
        ],
    ],
    'children' => [
        'form' => [
            'viewModel' => \T4web\Admin\ViewModel\\UpdateFormViewModel::class,
            'extend' => 't4web-admin-form',
            'data' => [
                'static' => [
                    'actionRoute' => 'admin-show-update',
                ],
            ],
        ],
    ],
  ],
```

Willbe rendered as

![new page](http://teamforweb.com/var/view-03.jpg)
