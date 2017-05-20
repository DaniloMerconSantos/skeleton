<?php

namespace SkeletonModule\Application;

use SkeletonModule\Infrastructure\Repository\Generic\RepositoryInterface;
use SkeletonModule\Model\Conta;

class AccountService
{

    private $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function addConta(array $input): array
    {
        $conta = new Conta();
        $conta->setTipo($input['tipo']);

        $contaAdd = $this->repository->add($conta);

        return $contaAdd->toArray();
    }

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

    public function findConta(int $id)
    {
        $conta = $this->repository->find($id);
        return $conta->toArray();
    }

    public function update(int $id, array $input): array
    {

        $find = $this->repository->find($id);

        $find->setTipo($input['tipo']);

        $update = $this->repository->update($find);

        return $update->toArray();
    }

    public function delete(int $id): bool
    {
        $find = $this->repository->find($id);

        return $this->repository->delete($find);
    }
}
