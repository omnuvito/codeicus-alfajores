<?php

namespace App\Controller\Rest;

use App\Entity\Alfajor;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AlfajoresController
 * @package App\Controller\Rest
 */
class AlfajoresController extends FOSRestController
{
    /**
     * Get All Alfajores
     *
     * @Rest\Get("/alfajores")
     * @return View
     */
    public function getAllAlfajores(): View
    {
        try {
            $alfajores = $this->getDoctrine()
                ->getRepository(Alfajor::class)
                ->findAll();

            $response = $alfajores;
        } catch (\Exception $e) {
            $response = $e->getMessage();
        }

        return View::create($response, Response::HTTP_OK , []);
    }

    /**
     * Create Alfajor
     *
     * @Rest\Post("/alfajores")
     * @param Request $request
     * @return View
     */
    public function createAlfajor(Request $request): View
    {
        $error = null;
        $state = Response::HTTP_OK;
        $entityManager = $this->getDoctrine()->getManager();
        $alfajor = new Alfajor($request->get('gusto'), $request->get('letra'), $request->get('valor'));

        try {
            $entityManager->persist($alfajor);
            $entityManager->flush();

            $response = "Se creo nuevo sabor de alfajor: " . $alfajor->getGusto() . " con precio: " . $alfajor->getValor();
            $messageClass = "alert alert-success";
        } catch (\Exception $e) {
            $state = Response::HTTP_BAD_REQUEST;
            $messageClass = "alert alert-danger";
            $response = $e->getMessage();
        }

        return View::create(['response' => $response, 'state' => $state, 'mc' => $messageClass],  $state, []);
    }
}
