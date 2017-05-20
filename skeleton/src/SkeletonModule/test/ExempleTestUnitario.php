<?php
declare(strict_types = 1);
namespace test\Application;
use Doctrine\ORM\EntityManager;
use SebastianBergmann\CodeCoverage\TestCase;
use SkeletonModule\Application\Repository\Conta\AccountRepository;
use SkeletonModule\Model\Conta;
use SkeletonModule\Application\Repository\AbstractRepository;
class ExempleTestUnitario extends AbstractRepository
{
    public function repository()
    {
        $entityManager = self::obterContainer(EntityManager::class);
        return new AccountRepository($entityManager);
    }
    /**
     * @group accountAddRepositoryUnitario
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
    }
    /**
     * @group accountListAllRepositoryUnitario
     */
    public function testListAll()
    {
        $repository = $this->repository();
        $view = $repository->listAll();
        $this->assertInternalType('array', $view);
    }
    /**
     * @group accountListAllParamsRepositoryUnitario
     */
    public function testListAllParams()
    {
        $tipo = ['tipo' => 'teste2'];
        $repository = $this->repository();
        $view = $repository->listAll($tipo);
        $this->assertInternalType('array', $view);
    }
    /**
     * @group accountFindUnitario
     */
    public function testFind()
    {
        $id = 2;
        $repository = $this->repository();
        $find = $repository->find($id);
        $this->assertNotEmpty($find);
        $this->assertNotNull($find);
    }
    /**
     * @group accountUpdateUnitario
     */
    public function testUpdate()
    {
        $id = 2;
        $repository = $this->repository();
        $find = $repository->find($id);
        $find->setTipo('tipo');
        $update = $repository->update($find);
        $this->assertNotEmpty($update);
    }
    /**
     * @group accountDeleteUnitario
     */
    public function testDelete()
    {
        $id = 4;
        $repository = $this->repository();
        $find = $repository->find($id);
        $delete = $repository->delete($find);
        $this->assertTrue($delete);
    }
}