<?php


namespace Comments\Comment;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use T4webDomainInterface\Infrastructure\RepositoryInterface;

class ListServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var RepositoryInterface $repository */
        $repository = $serviceLocator->get('Comment\Infrastructure\FinderAggregateRepository');

        return new ListService($repository);
    }
}
