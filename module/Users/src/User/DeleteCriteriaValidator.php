<?php

namespace Users\User;

use Sebaks\Controller\ValidatorInterface;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;

class DeleteCriteriaValidator extends BaseValidator
{
    public function __construct()
    {
        $this->inputFilter = new InputFilter();

        $age = new Input('id');
        $age->getValidatorChain()
            ->attachByName('Digits')
            ->attachByName(
                'GreaterThan',
                [
                    'min' => 0,
                ]
            );

        $this->inputFilter->add($age);
    }
}