<?php

namespace App\Entity\Pricing;

/**
 * Class TresAlfajoresIdenticosAlineados
 * @package App\Entity\Pricing
 */
class TresAlfajoresIdenticosAlineados implements \App\Entity\Api\PricingInterface
{
    /**
     * @inheritdoc
     */
    public function calculatePrice(\App\Entity\Box $box): float
    {
        $price = 0;
        $equal = false;
        $alfajores = $box->getAlfajores();

        //Hilera de 3 Horizontal
        for ($row = 0; $row < $box->getFilas(); $row++) {
            for ($column = 0; $column < $box->getColumnas(); $column++) {
                $alfajor = $alfajores[$row][$column];

                if ($column + ($box->getColumnas() - 1) == ($box->getColumnas() - 1)) {
                    while ($column < ($box->getColumnas() - 1)) {
                        $column++;
                        $alfajorDerecha = $alfajores[$row][$column];

                        if ($alfajor->getGusto() == $alfajorDerecha->getGusto()) {
                            $equal = true;
                        } else {
                            $equal = false;
                            break;
                        }
                    }

                    if ($equal) {
                        $price += 2.50;
                    }
                }
            }
        }

        //Hilera de 3 vertical
        for ($row = 0; $row < $box->getFilas(); $row++) {
            for ($column = 0; $column < $box->getColumnas(); $column++) {
                $alfajor = $alfajores[$row][$column];

                if ($row + ($box->getFilas() - 1) == ($box->getFilas() - 1)) {
                    $newRow = 0;

                    while ($newRow < ($box->getFilas() -1)) {
                        $newRow++;
                        $alfajorDebajo = $alfajores[$newRow][$column];

                        if ($alfajor->getGusto() == $alfajorDebajo->getGusto()) {
                            $equal = true;
                        } else {
                            $equal = false;
                            break;
                        }
                    }

                    if ($equal) {
                        $price += 2.50;
                    }
                }
            }
        }

        //Hilera de 3 Diagonal
        for ($row = 0; $row < $box->getFilas(); $row++) {
            for ($column = 0; $column < $box->getColumnas(); $column++) {
                $alfajor = $alfajores[$row][$column];

                if (($row == $column) && ($row + ($box->getFilas() - 1) == ($box->getFilas() - 1)) &&
                    ($column + ($box->getColumnas() - 1) == ($box->getColumnas() - 1))) {
                    while (($row < ($box->getFilas() -1)) && ($column < ($box->getColumnas() -1))) {
                        $row++;
                        $column++;

                        $alfajorDiagonal = $alfajores[$row][$column];

                        if ($alfajor->getGusto() == $alfajorDiagonal->getGusto()) {
                            $equal = true;
                        } else {
                            $equal = false;
                            break;
                        }
                    }

                    if ($equal) {
                        $price += 2.50;
                    }
                }
            }
        }

        //Hilera de 3 Diagonal Inversa
        for ($row = 0; $row < $box->getFilas(); $row++) {
            for ($column = 0; $column < $box->getColumnas(); $column++) {
                $alfajor = $alfajores[$row][$column];

                if (($row + ($box->getFilas() - 1) == ($box->getFilas() - 1)) && ($column == $box->getColumnas() - 1)) {
                    while (($column - 1 > 0) && ($row + 1 < $box->getFilas())) {
                        $row++;
                        $column--;

                        $alfajorDiagonal = $alfajores[$row][$column];

                        if ($alfajor->getGusto() == $alfajorDiagonal->getGusto()) {
                            $equal = true;
                        } else {
                            $equal = false;
                            break;
                        }
                    }

                    if ($equal) {
                        $price += 2.50;
                    }
                }
            }
        }

        return $price;
    }
}
