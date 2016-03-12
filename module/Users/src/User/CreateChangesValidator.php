<?php

namespace Users\User;

use Sebaks\Controller\ValidatorInterface;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;

class CreateChangesValidator extends BaseValidator
{
    public function __construct()
    {
        $this->inputFilter = new InputFilter();

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

        $this->inputFilter->add($name);
    }
}
