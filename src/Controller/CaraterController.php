<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CaraterController extends AbstractController
{
    /**
     * @Route("/carater", name="carater")
     */
    public function index(): Response
    {
        return $this->render('carater/index.html.twig', [
            'controller_name' => 'CaraterController',
        ]);
    }
}
