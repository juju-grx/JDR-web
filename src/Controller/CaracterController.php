<?php

namespace App\Controller;

use App\Entity\Caracter;
use App\Form\CaracterType;
use App\Repository\CaracterRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/caracter")
 */
class CaracterController extends AbstractController
{
    /**
     * @Route("/", name="caracter_index", methods={"GET"})
     */
    public function index(CaracterRepository $caracterRepository): Response
    {
        return $this->render('caracter/index.html.twig', [
            'caracters' => $caracterRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="caracter_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $caracter = new Caracter();
        $form = $this->createForm(CaracterType::class, $caracter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $caracter->setLevel(1);
            $entityManager->persist($caracter);
            $entityManager->flush();

            return $this->redirectToRoute('caracter_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('caracter/new.html.twig', [
            'caracter' => $caracter,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="caracter_show", methods={"GET"})
     */
    public function show(Caracter $caracter): Response
    {
        return $this->render('caracter/show.html.twig', [
            'caracter' => $caracter,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="caracter_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Caracter $caracter, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CaracterType::class, $caracter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('caracter_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('caracter/edit.html.twig', [
            'caracter' => $caracter,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="caracter_delete", methods={"POST"})
     */
    public function delete(Request $request, Caracter $caracter, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$caracter->getId(), $request->request->get('_token'))) {
            $entityManager->remove($caracter);
            $entityManager->flush();
        }

        return $this->redirectToRoute('caracter_index', [], Response::HTTP_SEE_OTHER);
    }
}
