<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: ediaimoborges
 * Date: 14/04/17
 * Time: 19:24
 */
namespace SkeletonModule\Infrastructure\Repository\Generic;

use SkeletonModule\Model\ModelInterface;

interface RepositoryInterface
{
    public function add(ModelInterface $model): ModelInterface;

    public function find(int $id): ModelInterface;

    public function update(ModelInterface $model): ModelInterface;

    public function delete(ModelInterface $model): bool;

    public function listAll(array $params): array;
}
