<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\MakerBundle\Tests\tmp\current_project\src\Entity\User;

class CompteController extends AbstractController
{
    #[Route('/compte', name: 'app_compte')]
    public function index(): Response
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $user = $repository->findAll();

        return $this->render('compte/compte.html.twig', [
            'users' => $user,
        ]);
    }

     /**
     * @Route("/modifier/{id}", name="modifier")
     */
    public function edit(Request $request, $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entity = $entityManager->getRepository(User::class)->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Aucune entité trouvée pour cet identifiant : ' . $id);
        }

        $form = $this->createForm(UserType::class, $entity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_compte'); // Rediriger vers la page de liste ou une autre page après modification
        }

        return $this->render('edit/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
