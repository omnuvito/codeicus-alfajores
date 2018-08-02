<?php

namespace App\Entity\Pricing;

/**
 * Class Manager
 * @package App\Entity\Pricing
 */
class Manager
{
    /**
     * @var array Pricing Methods Array
     */
    private $pricingMethods = [];

    /**
     * Manager constructor
     */
    public function __construct()
    {
        //Agregamos todas las validaciones para calcular el precio de la caja.

        $this->pricingMethods[] = new \App\Entity\Pricing\SimpleTotal();
        $this->pricingMethods[] = new \App\Entity\Pricing\DosAlfajoresIdenticosAlineados();
        $this->pricingMethods[] = new \App\Entity\Pricing\FrutillaCentro();
        $this->pricingMethods[] = new \App\Entity\Pricing\TresAlfajoresIdenticosAlineados();
    }

    /**
     * Calcula el valor de una caja iterando por los distintos metodos de pricing disponibles
     *
     * @param \App\Entity\Box $box
     * @return float
     */
    public function calculateBoxPrice(\App\Entity\Box $box) : float
    {
        $price = 0.0;

        foreach ($this->pricingMethods as $method) {
            if ($method instanceof \App\Entity\Api\PricingInterface) {
                $addedPrice = $method->calculatePrice($box);
                $price += $addedPrice;
            }
        }

        return $price;
    }
}