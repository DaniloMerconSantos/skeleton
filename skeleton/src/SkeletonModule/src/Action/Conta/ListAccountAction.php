<?php
declare(strict_types=1);

namespace SkeletonModule\Action\Conta;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use SkeletonModule\Application\AccountService;
use Zend\Diactoros\Response\JsonResponse;

/**
 * Created by PhpStorm.
 * User: danilosantos@conder.intranet
 * Date: 18/05/17
 * Time: 16:33
 */

/**
 * Class AddAccountAction
 * @package SkeletonModule\Application\Action
 */
class ListAccountAction implements MiddlewareInterface
{

    /**
     * @var
     */
    private $accountService;

    /**
     * @param AccountService $accountService
     */
    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    /**
     * @param ServerRequestInterface $request
     * @param DelegateInterface $delegate
     * @return JsonResponse
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        try{

            return new JsonResponse($this->accountService->listConta($request->getParsedBody()));

        } catch(\Exception $e){

            return new JsonResponse($e->getMessage(), 400);
        }
    }


}