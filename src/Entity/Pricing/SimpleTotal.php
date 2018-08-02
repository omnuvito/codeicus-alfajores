<?php

namespace App\Entity\Pricing;

/**
 * Class SimpleTotal
 * @package App\Entity\Pricing
 */
class SimpleTotal implements \App\Entity\Api\PricingInterface
{
    /**
     * @inheritdoc
     */
    public function calculatePrice(\App\Entity\Box $box) : float
    {
        $price = 0.0;
        $alfajores = $box->getAlfajores();

        for ($row = 0; $row < $box->getFilas(); $row++) {
            for ($column = 0; $column < $box->getColumnas(); $column++) {
                $alfajor = $alfajores[$row][$column];
                $price += $alfajor->getValor();
            }
        }

        return $price;
    }
}
