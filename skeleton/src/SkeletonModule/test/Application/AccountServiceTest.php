<?php

declare(strict_types = 1);

namespace test\Application;

use PHPUnit\Framework\TestCase;
use SkeletonModule\Application\AccountService;
use SkeletonModule\Infrastructure\Repository\Generic\RepositoryInterface;
use SkeletonModule\Model\Conta;

class AccountServiceTest extends TestCase
{

    public $service;

    /**
     * @group accountServiceAdd
     */
    public function testAddService()
    {
        $input = ['tipo' => 'teste serviço'];
        $output = [
            'id' => null,
            'tipo' => 'teste serviço',
        ];

        $conta = new Conta();
        $conta->setTipo($input['tipo']);

        $retornoConta = clone $conta;

        $repository = $this->prophesize(RepositoryInterface::class);
        $repository->add($conta)->willReturn($retornoConta);

        $add = new AccountService($repository->reveal());

        $resultado = $add->addConta($input);

        $this->assertEquals($output, $resultado);
    }

    /**
     * @group accountServiceListAll
     */
    public function testListService()
    {
        $output = [
            [
                'id' => null,
                'tipo' => 'teste'
            ],
            [
                'id' => null,
                'tipo' => 'teste2'
            ]
        ];

        $conta = new Conta();

        $conta->setTipo($output[0]['tipo']);

        $returnConta = [
            clone $conta,
            clone $conta
        ];

        $input = [
            'page' => 1,
            'limit' => 2
        ];


        $repository = $this->prophesize(RepositoryInterface::class);
        $repository->listAll($input)->willReturn($returnConta);

        $contaService = new AccountService($repository->reveal());

        $result = $contaService->listConta($input);

        $this->assertEquals($result, $returnConta);
    }

    /**
     * @group accountServiceFind
     */
    public function testFindService()
    {
        $id = 1;
        $output =
            [
                'id' => null,
                'tipo' => 'teste'
            ];
        $outputRepo = new Conta();
        $outputRepo->setTipo($output['tipo']);

        // Mock do repositório
        $repository = $this->prophesize(RepositoryInterface::class);
        $repository->find($id)->willReturn($outputRepo);

        $contaService = new AccountService($repository->reveal());
        $result = $contaService->findConta($id);

        $this->assertEquals($result, $output);
    }

    /**
     * @group accountServiceUpdate
     */
    public function testUpdateService()
    {
        $id = 1;

        $input = [
            'tipo' => 'dados servico'
        ];

        $output = [
            'id' => null,
            'tipo' => 'dados servico'
        ];

        $conta = new Conta();
        $conta->getId($id);
        $conta->setTipo($input['tipo']);

        $findOut = clone $conta;
        $updateOut = clone $findOut;

        $repository = $this->prophesize(RepositoryInterface::class);

        $repository->find($id)->willReturn($findOut);
        $repository->update($conta)->willReturn($updateOut);

        $update = new AccountService($repository->reveal());

        $resultado = $update->update($id, $input);

        $this->assertEquals($resultado, $output);

    }

    /**
     * @group accountServiceDelete
     */
    public function testDeleteService()
    {
        $id = 1;

        $output = [
            'id' => null,
            'tipo' => 'dados servico'
        ];

        $account = new Conta();
        $account->setTipo($output['tipo']);

        $repository = $this->prophesize(RepositoryInterface::class);
        $repository->find($id)->willReturn($account);
        $repository->delete($account)->willReturn(true);

        $accountService = new AccountService($repository->reveal());

        $this->assertTrue($accountService->delete($id));
    }
}
