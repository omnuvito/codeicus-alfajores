<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AlfajorRepository")
 */
class Alfajor
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $gusto;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $letra;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $valor;

    public function __construct($gusto, $letra, $valor)
    {
        $this->setGusto($gusto);
        $this->setLetra($letra);
        $this->setValor($valor);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getGusto(): ?string
    {
        return $this->gusto;
    }

    public function setGusto(?string $gusto): self
    {
        $this->gusto = $gusto;

        return $this;
    }

    public function getLetra(): ?string
    {
        return $this->letra;
    }

    public function setLetra(?string $letra): self
    {
        $this->letra = $letra;

        return $this;
    }

    public function getValor(): ?float
    {
        return $this->valor;
    }

    public function setValor(?float $valor): self
    {
        $this->valor = $valor;

        return $this;
    }
}
