<?php
declare(strcit_typres=1);

/**
 * Created by PhpStorm.
 * User: merco
 * Date: 21/05/2017
 * Time: 10:40
 */

use PHPUnit\Framework\TestCase;
use SkeletonModule\Application\AccountService;
use SkeletonModule\Action\Conta\AddAccountAction;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

/**
 * @group testAddAccounte
 */
class AddAccountActionTest extends TestCase
{

    public function testAddAccounte()
    {
        $input = [
            'tipo' => 'teste action'
        ];
        $output = [
            'id' => 1,
            'nome' => 'teste action'
        ];
        $request = $this->prophesize(ServerRequestInterface::class);
        $request->getParsedBody()->willReturn($input)->shouldBeCalled();
        $service = $this->prophesize(AccountService::class);
        $service->addConta($input)->willReturn($output)->shouldBeCalled();
        $action = new AddAccountAction($service->reveal());
        $response = $action->process(
            $request->reveal(),
            $this->prophesize(DelegateInterface::class)->reveal()
        );
        $result = (array)json_decode((string)$response->getBody());
        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals($output, $result);
    }
}