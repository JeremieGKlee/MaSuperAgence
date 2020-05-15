<?php

namespace App\Form;

use App\Entity\Property;
use App\Entity\PropertySearch;
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
            // ->add('minRooms', IntegerType::class,
            // [
            //     'required'=> false,
            //     'label'=> 'Nbre de pièces minimales',
            //     'attr' => 
            //     [
            //         'placeholder' => 'Nbre de pièces minimales'
            //     ]
            // ])
            // ->add('minBedrooms', IntegerType::class,
            // [
            //     'required'=> false,
            //     'label'=> 'Nbre de chambres minimales',
            //     'attr' => 
            //     [
            //         'placeholder' => 'Nbre de chambres minimales'
            //     ]
            // ])
            // ->add('selectTypeHeat', ChoiceType::class,
            // [
            //     'choices'=> $this->getChoices(),
            //     'required'=> false,
            //     'label'=> 'Type de chauffage',
            //     'attr' => 
            //     [
            //         'placeholder' => 'Type de chauffage'
            //     ]
            // ])
            // ->add('maxfloor', IntegerType::class,
            // [
            //     'required'=> false,
            //     'label'=> 'Etage max',
            //     'attr' => 
            //     [
            //         'placeholder' => 'Etage max'
            //     ]
            // ])
            // ->add('selectCity', TextType::class,
            // [
            //     'choices'=> $this->getChoices(),
            //     'required'=> false,
            //     'label'=> 'Type de chauffage',
            //     'attr' => 
            //     [
            //         'placeholder' => 'Type de chauffage'
            //     ]
            // ])
            // ->add('selectPostal_code', TextType::class,
            // [
            //     'required'=> false,
            //     'label'=> 'Etage max',
            //     'attr' => 
            //     [
            //         'placeholder' => 'Etage max'
            //     ]
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PropertySearch::class,
            'method' => 'get',
            'csrf_protection' => false
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
}
