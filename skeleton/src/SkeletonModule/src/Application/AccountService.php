<?php

namespace SkeletonModule\Application;

use SkeletonModule\Infrastructure\Repository\Generic\RepositoryInterface;
use SkeletonModule\Model\Conta;

/**
 * Class AccountService
 * @package SkeletonModule\Application
 */
class AccountService
{

    /**
     * @var RepositoryInterface
     */
    private $repository;

    /**
     * @param RepositoryInterface $repository
     */
    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $input
     * @return mixed
     */
    public function addConta(array $input): array
    {
        $conta = new Conta();
        $conta->setTipo($input['tipo']);

        $contaAdd = $this->repository->add($conta);

        return $contaAdd->toArray();
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function listConta(array $params): array
    {
        $dados = [];
        $conta = $this->repository->listAll($params);

        foreach ($conta as $account) {
            $dados['itens'][] = $account->toArray();
        }

        $dados['total'] = count($dados['itens']);

        return $conta;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findConta(int $id)
    {
        $conta = $this->repository->find($id);
        return $conta->toArray();
    }

    /**
     * @param int $id
     * @param array $input
     * @return mixed
     */
    public function update(int $id, array $input): array
    {

        $find = $this->repository->find($id);

        $find->setTipo($input['tipo']);

        $update = $this->repository->update($find);

        return $update->toArray();
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $find = $this->repository->find($id);

        return $this->repository->delete($find);
    }
}
