<?php
/**
 * Created by PhpStorm.
 * User: marcusamatos
 * Date: 9/19/16
 * Time: 08:22
 */

namespace Entrega\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Class Mapa
 * @package Entrega\Entity
 * @ORM\Entity
 */
class Mapa
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column
     */
    protected $nome;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Rota", mappedBy="mapa")
     */
    protected $rotas;

    public function __construct()
    {
        $this->rotas = new ArrayCollection();
    }

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
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return ArrayCollection
     */
    public function getRotas()
    {
        return $this->rotas;
    }

    /**
     * @param ArrayCollection $rotas
     */
    public function setRotas($rotas)
    {
        $this->rotas = $rotas;
    }

}