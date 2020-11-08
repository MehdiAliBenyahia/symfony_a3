<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Classes;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClassesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',TextType::class, [
                'attr' => [
                    'placeholder' => 'Titre du cours'
                ]
            ])
            ->add('description',TextareaType::class, [
                'attr' => [
                    'placeholder' => 'Contenu du cours'
                ]
            ])
            ->add('date_created')
            ->add('slug',TextType::class, [
                'attr' => [
                    'placeholder' => 'Slug du cours'
                ]
            ])
            ->add('category',EntityType::class,[
                'class' => Category::class,
                'choice_label' => 'label'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Classes::class,
        ]);
    }
}
