<?php

namespace App\DataFixtures;

use App\Entity\Auteur;
use App\Entity\Article;
use App\Entity\Tag;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $article1 = new Article();
        $article1->setTitre('aaaa');
        $article1->setTags('science-fiction');
        $article1->setAuteur('Arba');
        $manager->persist($article1);

        $article2 = new Article();
        $article2->setTitre('bbbb');
        $article2->setTags('science-fiction');
        $article2->setAuteur('Bara');
        $manager->persist($article2);

        $article3 = new Article();
        $article3->setTitre('cccc');
        $article3->setTags('science-fiction');
        $article3->setAuteur('Raba');
        $manager->persist($article3);

        $article4 = new Article();
        $article4->setTitre('dddd');
        $article4->setTags('science-fiction');
        $article4->setAuteur('Abra');
        $manager->persist($article4);


        $auteur1 = new Auteur();
        $auteur1->setNom('Arba');
        $auteur1->setListeArticle('aaaa, bbbb, cccc');
        $manager->persist($auteur1);

        $auteur2 = new Auteur();
        $auteur2->setNom('Bara');
        $auteur2->setListeArticle('bbbb, dddd');
        $manager->persist($auteur2);

        $auteur3 = new Auteur();
        $auteur3->setNom('Raba');
        $auteur3->setListeArticle('aaaa, dddd');
        $manager->persist($auteur3);

        $auteur4 = new Auteur();
        $auteur4->setNom('Abra');
        $auteur4->setListeArticle('cccc');
        $manager->persist($auteur4);


        $tag1 = new Tag();
        $tag1->setNom('science-fiction');
        $tag1->setArticles('aaaa, bbbb, cccc, dddd');
        $manager->persist($tag1);

        $tag2 = new Tag();
        $tag2->setNom('horreur');
        $tag2->setArticles('');
        $manager->persist($tag2);

        $tag3 = new Tag();
        $tag3->setNom('bande-dessinée');
        $tag3->setArticles('');
        $manager->persist($tag3);

        $tag4 = new Tag();
        $tag4->setNom('documentaire');
        $tag4->setArticles('');
        $manager->persist($tag4);

        
        $manager->flush();
    }
}
