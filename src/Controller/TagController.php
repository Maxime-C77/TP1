<?php

namespace App\Controller;

use App\Repository\TagRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TagController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(TagRepository $ajout): Response
    {
        dd($ajout->findAll());
    }
    #[Route('/tag/{id<\d+>?3}', name:'app_tag')]
    public function list(int $id): Response
    {
        $tags = [
            ['nom' => 'science-fiction', 'articles' => 'aaaa, bbbb, cccc, dddd'],
            ['nom' => 'horreur', 'articles' => ''],
            ['nom' => 'bande-dessinée', 'articles' => ''],
            ['nom' => 'documentaire', 'articles' => '']];
        return $this->render(
            'tag/index.html.twig',
            [
                'tags' => $tags
            ]
        );
    }
}
