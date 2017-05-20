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

/**
 * Class AccountRepository
 * @package SkeletonModule\Infrastructure\Repository
 */
class AccountRepository
{
    /**
     * @var
     */
    protected $model;

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;

        $this->model = Conta::class;
    }

    /**
     * @param ModelInterface $model
     * @return ModelInterface
     */
    public function add(ModelInterface $model): ModelInterface
    {
        $this->entityManager->persist($model);
        $this->entityManager->flush();

        return $model;
    }

    /**
     * @param array|null $params
     * @return mixed
     */
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

    /**
     * @param int $id
     * @return ModelInterface
     */
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

    /**
     * @param ModelInterface $model
     * @return ModelInterface
     */
    public function update(ModelInterface $model): ModelInterface
    {

        $this->entityManager->persist($model);
        $this->entityManager->flush();

        return $model;
    }

    /**
     * @param ModelInterface $model
     * @return bool
     */
    public function delete(ModelInterface $model): bool
    {
        $this->entityManager->remove($model);
        $this->entityManager->flush();

        return true;
    }

}