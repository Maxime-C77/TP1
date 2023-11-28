<?php

namespace App\Controller;

//use App\Entity\Article;
//use App\Form\ArticleType;
use App\Repository\ArticleRepository;
//use Doctrine\ORM\EntityManagerInterface;
//use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
//use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//UserPasswordHasherInterface $UserPasswordHasher

class ArticleController extends AbstractController
{    
    #[Route('/article', name: 'app_article')]
    public function index(ArticleRepository $article): Response
    {
        dd($ajout->findAll());
    }

    #[Route('/article/{id<\d+>?3}', name:'app_article')]
    public function list(int $id): Response
    {
        $articles = [
            ['titre' => 'aaaa', 'tags' => 'science-fiction', 'auteur' => 'Arba'],
            ['titre' => 'bbbb', 'tags' => 'science-fiction', 'auteur' => 'Bara'],
            ['titre' => 'cccc', 'tags' => 'science-fiction', 'auteur' => 'Raba'],
            ['titre' => 'dddd', 'tags' => 'science-fiction', 'auteur' => 'Abra']];
        return $this->render(
            'article/index.html.twig',
            [
                'articles' => $articles
            ]
        );
    }
   /* #[Route('/article', name: 'app_article_add')]
    public function index(ArticleRepository $article): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
       // $form = $this->createForm(ArticleType::class, $id);

            
        return $this->render('article/index.html.twig', 
        [
            'form' => $form
        ]);
    }*/
    

    /*#[Route('article/{id}', name: 'app_article_add')]
    public function add(Article $id, Request $request, EntityManagerInterface $manager): Response{
        $form = $this->createFormBuilder($article)
            ->add('titre')
            ->add('submit', SubmitType::class, ['label'=>'ajouter'])
            ->getForm();

        $form->handleRequest($request);
        if($form->isSubmitted()&&isValid()){
            $article = $form->getData();
            $manager->persist($article);
            $manager->flush();

            $this->addFlash('réussit'."l'ajout à été éffectué");
            return $this->redirectToRoute('app_article_add');
        }
    }
    #[Route('article/{id}', name: 'app_article_edit')]
    public function edit(Article $id, Request $request, EntityManagerInterface $manager): Response{
        $form = $this->createFormBuilder($article)
            ->add('titre')
            ->add('submit', SubmitType::class, ['label'=>'ajouter'])
            ->getForm();

        $form->handleRequest($request);
        if($form->isSubmitted()&&isValid()){
            $article = $form->getData();
            $manager->persist($article);
            $manager->flush();

            $this->addFlash('réussit'.'la modification à été éffectué');
            return $this->redirectToRoute('app_article_add');
        }
    }*/
    
    

    
    

}