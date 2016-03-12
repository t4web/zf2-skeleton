<?php

namespace Users\User;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ReadCriteriaValidatorFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $entityExistValidator = $serviceLocator->get('Users\User\EntityExistValidator');

        return new ReadCriteriaValidator($entityExistValidator);
    }
}
