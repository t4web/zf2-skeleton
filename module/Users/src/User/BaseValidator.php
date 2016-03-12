<?php

namespace Users\User;

use Sebaks\Controller\ValidatorInterface;
use Zend\InputFilter\InputFilter;

class BaseValidator implements ValidatorInterface
{
    public function __construct()
    {
        $this->inputFilter = new InputFilter();
    }

    public function isValid($data)
    {
        $this->inputFilter->setData($data);

        return $this->inputFilter->isValid($data);
    }

    public function getErrors()
    {
        return $this->inputFilter->getMessages();
    }

    public function getValid()
    {
        $validInput = $this->inputFilter->getValidInput();

        $valid = [];
        foreach ($validInput as $name => $input) {
            $value = $input->getValue();
            $empty = ($value === null || $value === '' || $value === []);
            if (!$empty) {
                $valid[$name] = $input->getValue();
            }
        }

        return $valid;
    }
}
