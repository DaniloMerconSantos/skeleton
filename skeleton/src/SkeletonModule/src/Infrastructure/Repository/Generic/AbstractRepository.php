<?php
/**
 * Created by PhpStorm.
 * User: danilosantos@conder.intranet
 * Date: 15/05/17
 * Time: 16:25
 */

namespace SkeletonModule\Infrastructure\Repository\Generic;


use PHPUnit\Framework\TestCase;

abstract class AbstractRepository extends TestCase
{
    protected static $container;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $container = require __DIR__ .'/../../../../../../config/container.php';
        self::$container = $container;
    }

    public static function obterContainer($classe)
    {
        return self::$container->get($classe);
    }
}