<?php

namespace Users\User;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use T4webDomainInterface\Infrastructure\RepositoryInterface;

class EntityExistValidatorFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var RepositoryInterface $repository */
        $repository = $serviceLocator->get('Users\User\Infrastructure\Repository');

        return new EntityExistValidator($repository);
    }
}
