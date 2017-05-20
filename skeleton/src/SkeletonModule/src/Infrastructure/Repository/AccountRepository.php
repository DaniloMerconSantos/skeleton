<?php

/**
 * Created by PhpStorm.
 * User: danilosantos@conder.intranet
 * Date: 12/05/17
 * Time: 16:57
 */

namespace SkeletonModule\Infrastructure\Repository;


use Doctrine\ORM\EntityManager;
use SkeletonModule\Model\Conta;
use SkeletonModule\Model\ModelInterface;

class AccountRepository
{
    protected $model;

    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;

        $this->model = Conta::class;
    }

    public function add(ModelInterface $model): ModelInterface
    {
        $this->entityManager->persist($model);
        $this->entityManager->flush();

        return $model;
    }

    public function listAll(array $params = null): array
    {

        if (isset($params)) {
            $accout = $this->entityManager
                ->getRepository($this->model)
                ->findBy(
                    [
                        'tipo' => $params['tipo']
                    ]
                );

            return $accout;
        }

        $accout = $this->entityManager->getRepository($this->model)->findAll();

        if ($accout == null) {
            return [];
        }

        return $accout;
    }

    public function find(int $id): ModelInterface
    {
        $accout = $this->entityManager
            ->getRepository($this->model)
            ->findOneBy(
                [
                    'id' => $id
                ]
            );

        return $accout;
    }

    public function update(ModelInterface $model): ModelInterface
    {

        $this->entityManager->persist($model);
        $this->entityManager->flush();

        return $model;
    }

    public function delete(ModelInterface $model): bool
    {
        $this->entityManager->remove($model);
        $this->entityManager->flush();

        return true;
    }

}