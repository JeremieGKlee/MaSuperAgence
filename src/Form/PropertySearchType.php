<?php

namespace App\Form;

use App\Entity\Option;
use App\Entity\Property;
use App\Entity\PropertySearch;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PropertySearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('typeSort', ChoiceType::class,
            [
                'choices'=> $this->getChoicesType(),
                'required'=> false,
                'label'=> 'Bien souhaité',
                'attr' => 
                [
                    'placeholder' => 'Bien souhaité'
                ]
            ])
            ->add('minSurface', IntegerType::class,
            [
                'required'=> false,
                'label'=> 'Surface minimale (m²)',
                'attr' => 
                [
                    'placeholder' => 'Surface minimale'
                ]
            ])
            ->add('maxPrice', IntegerType::class,
            [
                'required'=> false,
                'label'=> 'Budget max (€)',
                'attr' => 
                [
                    'placeholder' => 'Budget max'
                ]
            ])
            ->add('minRooms', IntegerType::class,
            [
                'required'=> false,
                'label'=> 'Nbre de pièces min.',
                'attr' => 
                [
                    'placeholder' => 'Nbre de pièces min.'
                ]
            ])
            ->add('minBedrooms', IntegerType::class,
            [
                'required'=> false,
                'label'=> 'Nbre de chambres min.',
                'attr' => 
                [
                    'placeholder' => 'Nbre de chambres min.'
                ]
            ])
            ->add('selectTypeHeat', ChoiceType::class,
            [
                'choices'=> $this->getChoices(),
                'required'=> false,
                'label'=> 'Type de chauffage',
                'attr' => 
                [
                    'placeholder' => 'Type de chauffage'
                ]
            ])
            ->add('maxFloor', IntegerType::class,
            [
                'required'=> false,
                'label'=> 'Etage max',
                'attr' => 
                [
                    'placeholder' => 'Etage max'
                ]
            ])
            ->add('selectCity', TextType::class,
            [
                'required'=> false,
                'label'=> 'Ville souhaitée',
                'attr' => 
                [
                    'placeholder' => 'Ville souhaitée'
                ]
            ])
            ->add('selectPostalcode', TextType::class,
            [
                'required'=> false,
                'label'=> 'Code postal souhaité',
                'attr' => 
                [
                    'placeholder' => 'Code postal souhaité'
                ]
            ])
            ->add('options', EntityType::class,
            [
                'required'=> false,
                'label'=> 'Options choisies',
                'class' => Option::class,
                'choice_label' => 'name',
                'multiple' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PropertySearch::class,
            'method' => 'get',
            'csrf_protection' => false,
            'translation_domain' => 'forms'
        ]);
    }

    public function  getBlockPrefix()
    {
        return '';
    }

    private function getChoices()
    {
        $choices = Property::HEAT;
        $output = [];
        foreach($choices as $k => $v)
        {
            $output[$v] = $k;
        }
        return $output;
    }

    private function getChoicesType()
    {
        $choices = Property::TYPE;
        $output = [];
        foreach($choices as $k => $v)
        {
            $output[$v] = $k;
        }
        return $output;
    }
}
