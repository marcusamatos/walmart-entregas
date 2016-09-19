<?php
/**
 * Created by PhpStorm.
 * User: marcusamatos
 * Date: 9/19/16
 * Time: 08:24
 */

namespace Entrega\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Rota
 * @package Entrega\Entity
 * @ORM\Entity
 */
class Rota
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @var int
     * @ORM\Column
     */
    protected $origem;

    /**
     * @var int
     * @ORM\Column
     */
    protected $destino;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $distancia;

    /**
     * @ORM\ManyToOne(targetEntity="Mapa", inversedBy="rotas")
     * @ORM\JoinColumn(name="mapa_id", referencedColumnName="id")
     */
    protected $mapa;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getOrigem()
    {
        return $this->origem;
    }

    /**
     * @param int $origem
     */
    public function setOrigem($origem)
    {
        $this->origem = $origem;
    }

    /**
     * @return int
     */
    public function getDestino()
    {
        return $this->destino;
    }

    /**
     * @param int $destino
     */
    public function setDestino($destino)
    {
        $this->destino = $destino;
    }

    /**
     * @return int
     */
    public function getDistancia()
    {
        return $this->distancia;
    }

    /**
     * @param int $distancia
     */
    public function setDistancia($distancia)
    {
        $this->distancia = $distancia;
    }

    /**
     * @return mixed
     */
    public function getMapa()
    {
        return $this->mapa;
    }

    /**
     * @param mixed $mapa
     */
    public function setMapa($mapa)
    {
        $this->mapa = $mapa;
    }
}