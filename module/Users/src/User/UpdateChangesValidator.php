<?php

namespace Users\User;

use Sebaks\Controller\ValidatorInterface;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;

class UpdateChangesValidator extends BaseValidator
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
                    'min' => 3,
                    'max' => 50,
                ]
            );

        $status = new Input('status');
        $status->getValidatorChain()
            ->attachByName(
                'InArray',
                [
                    'haystack' => [
                        \Users\User\Status::ACTIVE,
                        \Users\User\Status::DELETED,
                        \Users\User\Status::BLOCKED,
                    ],
                ]
            );

        $this->inputFilter = new InputFilter();
        $this->inputFilter->add($name);
        $this->inputFilter->add($status);
    }
}
