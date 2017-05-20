<?php
/**
 * Created by PhpStorm.
 * User: danilosantos@conder.intranet
 * Date: 17/05/17
 * Time: 09:40
 */
declare(strict_types=1);

namespace SkeletonModule\Model;

/**
 * Class Receita
 * @package SkeletonModule\Model
 */
class Receita implements ModelInterface
{
    /**
     * @var
     */
    private $id;

    /**
     * @var
     */
    private $valor;

    /**
     * @var
     */
    private $descricao_breve;

    /**
     * @var
     */
    private $data;

    /**
     * @var
     * Many Receita one Conta
     * @ManyToOne(targerEntity="Conta")
     * @JoinColumn(name="conta_id", referencedColumnName="id")
     */
    private $contaId;

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
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param mixed $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    /**
     * @return mixed
     */
    public function getDescricaoBreve()
    {
        return $this->descricao_breve;
    }

    /**
     * @param mixed $descricao_breve
     */
    public function setDescricaoBreve($descricao_breve)
    {
        $this->descricao_breve = $descricao_breve;
    }


    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getContaId()
    {
        return $this->contaId;
    }

    /**
     * @param Conta $contaId
     * @return $this
     */
    public function setContaId(Conta $contaId): Conta
    {
        $this->contaId = $contaId;

        return $this;
    }

    /**
     * @return mixed
     */
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