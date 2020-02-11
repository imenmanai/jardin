<?php


namespace JardinBundle\Form;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class PersonnelType1 extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')
            ->add('prenom')
            ->add('age')->add('nbH')->add('prixH')
            ->add('categorie',EntityType::class,array(
                    'class'=>'JardinBundle:Categorie',
                    'choice_label'=>'Type',
                    'multiple'=>false
                )
            )
          ;
    }
}