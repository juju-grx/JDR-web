<?php

namespace App\Controller;

use App\Entity\Element;
use App\Form\ElementType;
use App\Repository\ElementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/element")
 */
class ElementController extends AbstractController
{
    /**
     * @Route("/", name="element_index", methods={"GET"})
     */
    public function index(ElementRepository $elementRepository): Response
    {
        return $this->render('element/index.html.twig', [
            'elements' => $elementRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="element_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $element = new Element();
        $form = $this->createForm(ElementType::class, $element);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($element);
            $entityManager->flush();

            return $this->redirectToRoute('element_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('element/new.html.twig', [
            'element' => $element,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="element_show", methods={"GET"})
     */
    public function show(Element $element): Response
    {
        return $this->render('element/show.html.twig', [
            'element' => $element,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="element_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Element $element, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ElementType::class, $element, ['element' => $element]);
        $form->handleRequest($request);
        dump($form);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            //return $this->redirectToRoute('element_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('element/edit.html.twig', [
            'element' => $element,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="element_delete", methods={"POST"})
     */
    public function delete(Request $request, Element $element, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$element->getId(), $request->request->get('_token'))) {
            $entityManager->remove($element);
            $entityManager->flush();
        }

        return $this->redirectToRoute('element_index', [], Response::HTTP_SEE_OTHER);
    }
}
