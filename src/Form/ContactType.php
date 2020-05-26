<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class,
            [
                'attr' => 
                [
                    'placeholder' => 'Votre Prénom'
                ]
            ])
            ->add('lastname', TextType::class,
            [
                'attr' => 
                [
                    'placeholder' => 'Votre nom'
                ]
            ])
            ->add('phone', TextType::class,
            [
                'attr' => 
                [
                    'placeholder' => 'Votre téléphone'
                ]
            ])
            ->add('email', EmailType::class,
            [
                'attr' => 
                [
                    'placeholder' => 'Votre mail'
                ]
            ])
            ->add('message', TextareaType::class,
            [
                'attr' => 
                [
                    'placeholder' => 'Votre message'
                ]
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
            'translation_domain' => 'forms'
        ]);
    }
}
