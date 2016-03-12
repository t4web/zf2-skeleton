<?php

namespace Users\User;

use Sebaks\Controller\ValidatorInterface;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;

class ListCriteriaValidator extends BaseValidator
{
    public function __construct()
    {
        $this->inputFilter = new InputFilter();

        $name = new Input('name_like');
        $name->getFilterChain()
            ->attachByName('StringTrim');
        $name->getValidatorChain()
            ->attachByName(
                'StringLength',
                [
                    'min' => 0,
                    'max' => 50,
                ]
            );
        $name->setRequired(false);
        $name->clearFallbackValue();

        $id = new Input('id_equalTo');
        $id->getValidatorChain()
            ->attachByName('Digits')
            ->attachByName('GreaterThan', ['min' => 0]);
        $id->setRequired(false);

        $limit = new Input('limit');
        $limit->getValidatorChain()
            ->attachByName('Digits')
            ->attachByName('GreaterThan', ['min' => 0]);
        $limit->setRequired(false);

        $page = new Input('page');
        $page->getValidatorChain()
            ->attachByName('Digits')
            ->attachByName('GreaterThan', ['min' => 0]);
        $page->setRequired(false);

        $this->inputFilter->add($name);
        $this->inputFilter->add($id);
        $this->inputFilter->add($limit);
        $this->inputFilter->add($page);
    }
}
