<?php

namespace App\Entity\Pricing;

/**
 * Class DosAlfajoresIdenticosAlineados
 * @package App\Entity\Pricing
 */
class DosAlfajoresIdenticosAlineados implements \App\Entity\Api\PricingInterface
{
    /**
     * @inheritdoc
     */
    public function calculatePrice(\App\Entity\Box $box) : float
    {
        $price = 0.0;
        //Obtengo los Default de la caja
        $alfajores = $box->getAlfajores();

        for ($row = 0; $row < $box->getFilas(); $row++) {
            for ($column = 0; $column < $box->getColumnas(); $column++) {
                // Obtengo el alfajor de la posicion dada
                $alfajor = $alfajores[$row][$column];

                //Alfajor vecino derecha
                if ($column + 1 < $box->getColumnas()) {
                    $alfajorDerecha = $alfajores[$row][$column+1];

                    if ($alfajor->getLetra() == $alfajorDerecha->getLetra()) {
                        $price += 0.25;
                    }
                }

                //Alfajor vecino abajo
                if ($row + 1 < $box->getFilas()) {
                    $alfajorDebajo = $alfajores[$row+1][$column];

                    if ($alfajor->getLetra() == $alfajorDebajo->getLetra()) {
                        $price += 0.25;
                    }
                }

                //Alfajor vecino diagonal
                if (($column + 1 < $box->getColumnas()) && ($row + 1 < $box->getFilas())) {
                    $alfajorDiagonal = $alfajores[$row+1][$column+1];

                    if ($alfajor->getLetra() == $alfajorDiagonal->getLetra()) {
                        $price += 0.25;
                    }
                }

                //Alfajor vecino diagonal inversa
                if (($column - 1 >= 0) && ($row + 1 < $box->getFilas())) {
                    $alfajorDiagonal = $alfajores[$row+1][$column-1];

                    if ($alfajor->getLetra() == $alfajorDiagonal->getLetra()) {
                        $price += 0.25;
                    }
                }
            }
        }

        return $price;
    }
}
