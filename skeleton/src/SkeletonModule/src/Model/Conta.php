<?php
/**
 * Created by PhpStorm.
 * User: danilosantos@conder.intranet
 * Date: 11/05/17
 * Time: 16:41
 */
declare(strict_types=1);

namespace SkeletonModule\Model;

/**
 * Class Conta
 * @package SkeletonModule\src\Model
 */
class Conta implements ModelInterface
{
    /**
     * @var
     */
    private $id;

    /**
     * @var string
     */
    private $tipo;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param $tipo
     * @return $this
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }


    /**
     * @return mixed
     */
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'tipo' => $this->getTipo()
        ];
    }
}
