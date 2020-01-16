<?php

namespace App\Form;

use App\Entity\Administration;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdministrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('region')
            ->add('departement')
            ->add('commune')
            ->add('localite')
            ->add('longitude')
            ->add('latitude')
            ->add('email')
            ->add('website')
            ->add('service')
            ->add('image')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Administration::class,
        ]);
    }
}
