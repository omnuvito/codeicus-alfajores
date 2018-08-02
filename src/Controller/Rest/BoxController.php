<?php

namespace App\Controller\Rest;

use App\Entity\Alfajor;
use App\Entity\Box;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class BoxController
 * @package App\Controller\Rest
 */
class BoxController extends FOSRestController
{
    /**
     * Get Box Total Price
     *
     * @Rest\POST("/calculate_price")
     * @param Request $request
     * @return View
     */
    public function getTotalPrice(Request $request): View
    {
        $price = 0.0;
        $alfajores = [];
        $gustos = $request->request->all()['row'];
        $state = Response::HTTP_OK;
        $error = null;

        if (isset($gustos) && (count($gustos) > 0)) {
            $box = new Box();
            $alfajorRepository = $this->getDoctrine()
                ->getRepository(Alfajor::class);

            try {
                for ($fila = 0; $fila < $box->getFilas(); $fila++) {
                    for ($columna = 0; $columna < $box->getColumnas(); $columna++) {
                        $alfajores[$fila][$columna] = $alfajorRepository->findOneBy(['letra' => $gustos[$fila][$columna]]);
                    }
                }

                $box->setAlfajores($alfajores);

                $response = round($box->getBoxPrice(), 2);
                $messageClass = "alert alert-success";
            } catch (\Exception $e) {
                $state = Response::HTTP_BAD_REQUEST;
                $response = $e->getMessage();
                $messageClass = "alert alert-danger";
            }
        }

        return View::create(['response' => $response, 'state' => $state, 'mc' => $messageClass],  $state, []);
    }
}
