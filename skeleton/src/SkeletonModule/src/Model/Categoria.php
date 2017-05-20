<?php
/**
 * Created by PhpStorm.
 * User: danilosantos@conder.intranet
 * Date: 18/05/17
 * Time: 09:32
 */
declare(strict_types=1);

namespace SkeletonModule\Model;


/**
 * Class Categoria
 * @package SkeletonModule\Model
 */
class Categoria implements ModeloInterface
{

    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $descricao;
    /**
     * @var
     */
    private $receitaCategoria;

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
    public function getDescricao()
    {
        return $this->descricao;
    }
    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     *
     */
    public function __construct() {
        $this->$receitaCategoria = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'descricao' => $this->getData()
        ];
    }
}