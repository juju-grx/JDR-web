<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserEditType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="user_index", methods={"GET"})
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    /**
     * @Route("/search", name="user_search", methods={"POST"})
     */
    public function userSpe(Request $request, EntityManagerInterface $entityManager)
    {
        $data = $request->get('searchValue');

        $sql = "SELECT id, username, roles, email FROM user WHERE username LIKE '$data%' or email LIKE '%$data%';";
        
        $conn = $entityManager->getConnection();
        $stnt = $conn->prepare($sql);
        $resultSet = $stnt->executeQuery([]);
        $resultUsers = $resultSet->fetchAllAssociative();

        if($resultUsers) {
            return $this->json(['resultData' => $resultUsers, 'code' => 200, 'message' => 'Trouver'], 200);
        } else {
            return $this->json(['code' => 404, 'message' => '<p class="text-danger">Aucun Utilisateur trouvé</p>'], 200);
        }
    }

    /**
     * @Route("/{id}/edit", name="user_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UserEditType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="user_delete", methods={"POST"})
     */
    public function delete(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_index', [], Response::HTTP_SEE_OTHER);
    }
}
