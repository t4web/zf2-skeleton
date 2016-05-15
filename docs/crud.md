# ZF2 Skeleton. CRUD

#### Create route generator config

For CRUD action, we must describe actions config for `RouteGenerator`, somewhere in your `module.config.php`:

```php
'route-generation' => [
    [
        'entity' => 'show',
        'backend' => [
            'actions' => [
                'new',
                'create',
                'read',
                'update',
                'delete',
                'list',
            ],
            'options' => [
                'create' => [
                    'changesValidator' => Action\Admin\Show\CreateAction\ChangesValidator::class,
                ],
                'update' => [
                    'changesValidator' => Action\Admin\Show\CreateAction\ChangesValidator::class,
                ],
            ],
        ],
    ],
],
```

All actions must be accessed for this entity.

`ChangesValidator` - validate and return valid data from Request to Controller, we must diescribe wich data 
and how will be validated, all undescribed data will be ignored:
```php
<?php

namespace Shows\Action\Admin\Show\CreateAction;

use T4web\Crud\Validator\BaseValidator;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;
use Zend\InputFilter\FileInput;
use Zend\Validator;
use Zend\Filter;

class ChangesValidator extends BaseValidator
{
    public function __construct()
    {
        $name = new Input('name');
        $name->getFilterChain()
            ->attachByName('StringTrim');
        $name->getValidatorChain()
            ->attachByName(
                'StringLength',
                [
                    'min' => 1,
                    'max' => 255,
                ]
            );

        $description = new Input('description');
        $description->getFilterChain()
            ->attachByName('StringTrim');

        if (empty($_FILES)) {
            $picture = new Input('picture');
            $picture->getFilterChain()
                ->attachByName('StringTrim');
        } else {
            $picture = new FileInput('picture');
            $picture->getValidatorChain()
                ->attach(new Validator\File\UploadFile());
        }

        $this->inputFilter = new InputFilter();
        $this->inputFilter->add($name);
        $this->inputFilter->add($description);
        $this->inputFilter->add($picture);
    }
}
```
