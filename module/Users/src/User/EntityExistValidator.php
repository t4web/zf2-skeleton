<?php

namespace Users\User;

use Zend\Validator\AbstractValidator;
use T4webDomainInterface\Infrastructure\RepositoryInterface;

class EntityExistValidator extends AbstractValidator
{
    const ENTITY_NOT_EXIST = 'entity_not_exist';

    /**
     * @var RepositoryInterface
     */
    private $repository;

    protected $messageTemplates = [
        self::ENTITY_NOT_EXIST => "Entity with id '%value%' does not exists"
    ];

    /**
     * @param RepositoryInterface $repository
     */
    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function isValid($value)
    {
        $entity = $this->repository->findById($value);

        $this->setValue($value);

        if (!$entity) {
            $this->error(self::ENTITY_NOT_EXIST);
            return false;
        }

        return true;
    }
}
