<?php

namespace coursBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class CoursType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('description')->add('duree')->add('seats')->add('age',ChoiceType::class,
        [
            'choices'  => [
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6'=> '6'
            ],
        ]
    )->add('matiere',EntityType::class,array('class'=>'coursBundle:Matiere','choice_label'=>'nom','multiple'=>false));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'coursBundle\Entity\Cours'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'coursbundle_cours';
    }


}
