<?php

namespace JardinBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategorieType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('type',ChoiceType::class, ['required' => 'false',
            'choices'  => [
                'Animateur' => 'Animateur',
                'chauffeur' => 'chauffeur',
                'secritaire' => 'secretaire',
                'directeur'=>'directeur',
                'femme de menage'=>'femme de menage'


            ],

        ])
            ->add('description');

    }
}
