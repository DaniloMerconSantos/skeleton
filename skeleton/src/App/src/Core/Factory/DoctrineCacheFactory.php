<?php

namespace App\Core\Factory;

use Doctrine\Common\Cache\ArrayCache;
use Interop\Container\ContainerInterface;

class DoctrineCacheFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new ArrayCache();
    }
}