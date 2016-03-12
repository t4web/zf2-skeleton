<?php


namespace Users\User;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use T4webDomainInterface\Infrastructure\RepositoryInterface;

class ListViewModelFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var RepositoryInterface $repository */
        $repository = $serviceLocator->get('Users\User\Infrastructure\Repository');

        $paginator = new \T4web\Paginator\ViewModel($repository);

        $listViewModel = new ListViewModel();
        $listViewModel->setVariable('paginator', $paginator);

        return $listViewModel;
    }
}
