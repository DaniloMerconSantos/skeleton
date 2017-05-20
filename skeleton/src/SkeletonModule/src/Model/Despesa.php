<?php

/**
 * Created by PhpStorm.
 * User: danilosantos@conder.intranet
 * Date: 17/05/17
 * Time: 11:15
 */
declare(strict_types = 1);

namespace SkeletonModule\Model;

/**
 * Class Despesa
 * @package SkeletonModule\Model
 */
class Despesa implements ModelInterface
{

    /**
     * @var
     */
    private $id;
    private $valor;
    private $descricaoBreve;
    private $data;

    /**
     * @var
     * Many Despesa one Conta
     * @ManyToOne(targerEntity="Conta")
     * @JoinColumn(name="conta_id", referencedColumnName="id")
     */
    private $contaId;

    function getId()
    {
        return $this->id;
    }

    function getValor()
    {
        return $this->valor;
    }

    function getDescricaoBreve()
    {
        return $this->descricaoBreve;
    }

    function getData()
    {
        return $this->data;
    }

    function getContaId()
    {
        return $this->contaId;
    }

    function setValor($valor)
    {
        $this->valor = $valor;
    }

    function setDescricaoBreve($descricaoBreve)
    {
        $this->descricaoBreve = $descricaoBreve;
    }

    function setData($data)
    {
        $this->data = $data;
    }

    function setContaId($contaId)
    {
        $this->contaId = $contaId;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'valor' => $this->getValor(),
            'descricao_breve' => $this->getDescricaoBreve(),
            'data' => $this->getData(),
            'conta_id' => $this->getContaId()
        ];
    }

}
