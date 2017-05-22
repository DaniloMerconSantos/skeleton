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
use SkeletonModule\Action\Conta\ListAccountAction;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

/**
 * Class ListAccountActionTest
 * @group testListAllAccount
 */
class ListAccountActionTest extends TestCase
{


    public function testListAllAccount()
    {
        $conta = new \stdClass();
        $conta->id = null;
        $conta->tipo = 'teste list';

        $input = [];
        $output = [
            $conta,
            clone $conta,
            clone $conta,
        ];
        $request = $this->prophesize(ServerRequestInterface::class);
        $request->getQueryParams()->willReturn($input)->shouldBeCalled();
        $service = $this->prophesize(AccountService::class);
        $service->listConta($input)->willReturn($output)->shouldBeCalled();
        $action = new ListAccountAction($service->reveal());
        $response = $action->process(
            $request->reveal(),
            $this->prophesize(DelegateInterface::class)->reveal()
        );
        $result = (array)json_decode((string)$response->getBody());
        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals($output, $result);
    }
}