<?php

namespace enfantBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EnfantType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('sexe',ChoiceType::class,
            [
                'choices'  => [
                    'Fille' => 'Fille',
                    'Garcon' => 'Garcon'
                ],
            ])->add('nom')->add('prenom')->add('age',ChoiceType::class,
            [
                'choices'  => [
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6'=> '6'
                ],
            ]
            )->add('idBus',EntityType::class,array('class'=>'enfantBundle:Bus','choice_label'=>'ligne','multiple'=>false,'placeholder' => 'Choose an option','required' => false));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'enfantBundle\Entity\Enfant'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'enfantbundle_enfant';
    }


}
