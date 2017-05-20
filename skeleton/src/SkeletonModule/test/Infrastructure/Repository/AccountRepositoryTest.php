<?php

declare(strict_types = 1);

namespace test\Application\Repository;

use Doctrine\ORM\EntityManager;
use SebastianBergmann\CodeCoverage\TestCase;
use SkeletonModule\Infrastructure\Repository\AccountRepository;
use SkeletonModule\Model\Conta;
use SkeletonModule\Infrastructure\Repository\Generic\AbstractRepository;


/**
 * Class AccountRepositoryTest
 * @package test\Application
 * @group accountRepositoryModule
 */
class AccountRepositoryTest extends AbstractRepository

{
    public function repository()
    {
        $entityManager = self::obterContainer(EntityManager::class);
        return new AccountRepository($entityManager);
    }

    /**
     * @group accountAddRepository
     */
    public function testAdd()
    {
        $input = [
            'tipo' => 'teste2'
        ];

        $conta = new Conta();

        $conta->setTipo($input['tipo']);

        $repository = $this->repository();

        $addConta = $repository->add($conta);

        $this->assertInstanceOf(Conta::class, $addConta);

        return $addConta;
    }

    /**
     * @group accountListAllRepository
     *
     */
    public function testListAll()
    {
        $repository = $this->repository();

        $view = $repository->listAll();

        $this->assertInternalType('array', $view);
    }

    /**
     * @group accountListAllParamsRepository
     */
    public function testListAllParams()
    {
        $tipo = ['tipo' => 'teste2'];

        $repository = $this->repository();

        $view = $repository->listAll($tipo);

        $this->assertInternalType('array', $view);

    }

    /**
     * @depends testAdd
     * @group accountFind
     */
    public function testFind($conta)
    {

        $repository = $this->repository();
        $id = $repository->find($conta->getId());

        $this->assertNotEmpty($id);
        $this->assertNotNull($id);
    }

    /**
     * @depends testAdd
     * @group accountUpdate
     */
    public function testUpdate($conta)
    {
        $conta->setTipo('tipo');

        $repository = $this->repository();
        $update = $repository->update($conta);

        $this->assertNotEmpty($update);
    }

    /**
     * @depends testAdd
     * @group accountDelete
     */
    public function testDelete($conta)
    {

        $repository = $this->repository();
        $delete = $repository->delete($conta);

        $this->assertTrue($delete);
    }
}