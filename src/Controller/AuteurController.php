<?php

namespace App\Controller;

use App\Repository\AuteurRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AuteurController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(AuteurRepository $ajout): Response
    {
        dd($ajout->findAll());
    }
    #[Route('/auteur/{id<\d+>?3}', name:'app_auteur')]
    public function list(int $id): Response
    {
        $auteurs = [
            ['nom' => 'Arba', 'liste_article' => 'aaaa, bbbb, cccc'],
            ['nom' => 'Bara', 'liste_article' => 'bbbb, dddd'],
            ['nom' => 'Raba', 'liste_article' => 'aaaa, dddd'],
            ['nom' => 'Abra', 'liste_article' => 'cccc']];
        return $this->render(
            'auteur/index.html.twig',
            [
                'auteurs' => $auteurs
            ]
        );
    }
}
