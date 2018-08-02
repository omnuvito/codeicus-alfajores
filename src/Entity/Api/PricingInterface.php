<?php

namespace App\Entity\Api;

/**
 * Interface PricingInterface
 */
interface PricingInterface
{
    /**
     * Calculate price using a box
     *
     * @param \App\Entity\Box $box
     * @return float
     */
    public function calculatePrice(\App\Entity\Box $box) : float;
}
