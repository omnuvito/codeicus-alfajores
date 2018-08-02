<?php

namespace App\DataFixtures;

use App\Entity\Alfajor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AlfajorFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $values = [
            [
                'gusto' => 'Chocolate',
                'letra' => 'C',
                'valor' => 1.20
            ],
            [
                'gusto' => 'Dulce de leche',
                'letra' => 'D',
                'valor' => 1.10
            ],
            [
                'gusto' => 'Frutilla',
                'letra' => 'F',
                'valor' => 0.80
            ],
            [
                'gusto' => 'Limón',
                'letra' => 'L',
                'valor' => 0.70
            ],
            [
                'gusto' => 'Merengue',
                'letra' => 'M',
                'valor' => 2.05
            ],
            [
                'gusto' => 'Nueces',
                'letra' => 'N',
                'valor' => 2.85
            ]
        ];

        foreach ($values as $value) {
            $alfajor = new Alfajor();

            $alfajor->setGusto($value['gusto']);
            $alfajor->setLetra($value['letra']);
            $alfajor->setValor($value['valor']);

            $manager->persist($alfajor);
            $manager->flush();
        }
    }
}
