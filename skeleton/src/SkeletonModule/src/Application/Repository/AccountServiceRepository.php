<?php

/**
 * Created by PhpStorm.
 * User: danilosantos@conder.intranet
 * Date: 12/05/17
 * Time: 16:57
 */

namespace SkeletonModule\Application\Repository;

use SkeletonModule\Model\Conta;

class AccountServiceRepository
{
    protected $conta;

    public function __construct(Conta $conta)
    {
        $this->conta = $conta;
    }

    public function add(array $input)
    {
        $this->conta->
    }
}