<?php

namespace Users\User;

use Sebaks\Controller\ValidatorInterface;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;
use T4webDomainInterface\Infrastructure\RepositoryInterface;

class ReadCriteriaValidator extends BaseValidator
{
    public function __construct(EntityExistValidator $entityExistValidator)
    {
        $this->inputFilter = new InputFilter();

        $id = new Input('id');
        $id->getValidatorChain()
            ->attachByName('Digits')
            ->attachByName(
                'GreaterThan',
                [
                    'min' => 0,
                ]
            );
        $id->getValidatorChain()->attach($entityExistValidator);

        $this->inputFilter->add($id);
    }
}