<?php

namespace JardinBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AvisType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('descr')
            ->add('avis', ChoiceType::class, array(
                    'choices'   => array(
                        'tres mauvais'   => 1,
                        'mauvais' => 2,
                        'bien'   => 3,
                        'tres bien'   => 4,
                        'excellent'   => 5,
                    ),
                    'multiple'  => false,
                )
            );

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JardinBundle\Entity\Avis'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'jardinbundle_avis';
    }


}
