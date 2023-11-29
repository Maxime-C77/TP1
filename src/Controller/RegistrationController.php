<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\AdminUser;
use App\Form\RegistrationFormTypeUser;
use App\Form\RegistrationFormTypeAdmin;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegistrationController extends AbstractController
{
    #[Route('/registeradmin', name: 'app_registeradmin')]
    public function registeradmin(Request $request, UserPasswordHasherInterface $adminPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $admin = new AdminUser();
        $form = $this->createForm(RegistrationFormTypeAdmin::class, $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $admin->setPassword(
                $adminPasswordHasher->hashPassword(
                    $admin,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($admin);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_user');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormTypeUser::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_article');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
