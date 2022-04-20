<?php

namespace App\Controller;

use App\Entity\Element;
use App\Form\ElementType;
use App\Repository\ElementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
     * @Route("/spe", name="element_spe", methods={"POST"})
     */
    public function elementSpe(Request $request, EntityManagerInterface $entityManager)
    {
        $elementLevel = $request->get('elementLevelValue');
        $elementName = $request->get('elementNameValue');

        $sql = "SELECT id, `name` FROM speciality WHERE `level` > '$elementLevel' and `name` != '$elementName';";
        
        $conn = $entityManager->getConnection();
        $stnt = $conn->prepare($sql);
        $resultSet = $stnt->executeQuery([]);
        $resultElement = $resultSet->fetchAllAssociative();

        if($resultElement) {
            return $this->json(['resultData' => $resultElement, 'code' => 200, 'message' => 'Trouver'], 200);
        } else {
            return $this->json(['code' => 404, 'message' => '<p class="text-danger">Aucun Element trouvé</p>'], 200);
        }
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
