<?php

namespace App\Controller;

use App\Entity\TypeClass;
use App\Form\TypeClassType;
use App\Repository\TypeClassRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/typeClass")
 */
class TypeClassController extends AbstractController
{
    /**
     * @Route("/", name="type_class_index", methods={"GET"})
     */
    public function index(TypeClassRepository $typeClassRepository): Response
    {
        return $this->render('type_class/index.html.twig', [
            'type_classes' => $typeClassRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="type_class_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $typeClass = new TypeClass();
        $form = $this->createForm(TypeClassType::class, $typeClass);
        $form->handleRequest($request);
        dump($form);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($typeClass);
            $entityManager->flush();

            return $this->redirectToRoute('type_class_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_class/new.html.twig', [
            'type_class' => $typeClass,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="type_class_show", methods={"GET"})
     */
    public function show(TypeClass $typeClass): Response
    {
        return $this->render('type_class/show.html.twig', [
            'type_class' => $typeClass,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="type_class_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, TypeClass $typeClass, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TypeClassType::class, $typeClass);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('type_class_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_class/edit.html.twig', [
            'type_class' => $typeClass,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="type_class_delete", methods={"POST"})
     */
    public function delete(Request $request, TypeClass $typeClass, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeClass->getId(), $request->request->get('_token'))) {
            $entityManager->remove($typeClass);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_class_index', [], Response::HTTP_SEE_OTHER);
    }
}
