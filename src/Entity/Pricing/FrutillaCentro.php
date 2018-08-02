<?php

namespace App\Entity\Pricing;

/**
 * Class FrutillaCentro
 * @package App\Entity\Pricing
 */
class FrutillaCentro implements \App\Entity\Api\PricingInterface
{
    /**
     * @inheritdoc
     */
    public function calculatePrice(\App\Entity\Box $box) : float
    {
        $price = 0.0;
        $alfajores = $box->getAlfajores();
        //Calculamos el centro de la caja
        $rowCenter = floor($box->getFilas()/2);
        $columnCenter = floor($box->getColumnas()/2);
        //Buscamos el alfajor en el centro de la caja
        $alfajorCenter = $alfajores[$rowCenter][$columnCenter];

        if ($alfajorCenter->getLetra() == 'F') {
            $price += 9.8;
        }

        return $price;
    }
}
