<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BoxRepository")
 */
class Box
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $filas = 3;

    /**
     * @ORM\Column(type="integer")
     */
    private $columnas = 3;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $alfajores;

    public function dumpBox()
    {
        for ($row = 0; $row < $this->getFilas(); $row++) {
            for ($column = 0; $column < $this->getColumnas(); $column++) {
                $alfajor = $this->alfajores[$row][$column];
                echo $alfajor->getGusto().'-'.$alfajor->getLetra().'-'.$alfajor->getValor()." :: ";
            }
            echo "\n";
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFilas(): ?int
    {
        return $this->filas;
    }

    public function setFilas(int $filas): self
    {
        $this->filas = $filas;

        return $this;
    }

    public function getColumnas(): ?int
    {
        return $this->columnas;
    }

    public function setColumnas(int $columnas): self
    {
        $this->columnas = $columnas;

        return $this;
    }

    public function getAlfajores(): ?array
    {
        return $this->alfajores;
    }

    public function setAlfajores(?array $alfajores): self
    {
        $this->alfajores = $alfajores;

        return $this;
    }

    /**
     * Calcula el precio de la caja.
     *
     * @return float
     */
    public function getBoxPrice(): float
    {
        $pricingManager = new \App\Entity\Pricing\Manager();

        return $pricingManager->calculateBoxPrice($this);
    }
}
