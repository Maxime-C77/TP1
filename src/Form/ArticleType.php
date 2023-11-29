<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('button3', ButtonType::class, ['label'=>'Compte','attr' => [
            'onclick' => 'window.location.href="/compte";',
            ]])
            ->add('titre')
            ->add('tags')
            ->add('auteur')
            ->add('submit', SubmitType::class, ['label'=>'ajouter'])
            ->add('button1', ButtonType::class, ['label'=>'register','attr' => [
                'onclick' => 'window.location.href="/register";',
            ]])
            ->add('button2', ButtonType::class, ['label'=>'login','attr' => [
                'onclick' => 'window.location.href="/login";',
            ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
