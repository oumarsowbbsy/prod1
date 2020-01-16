<?php

namespace App\Form;

use App\Entity\Education;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EducationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('region')
            ->add('departement')
            ->add('commune')
            ->add('localite')
            ->add('type')
            ->add('latitude')
            ->add('longitude')
            ->add('telephone')
            ->add('email')
            ->add('heureOuverture')
            ->add('website')
            ->add('service')
            ->add('image')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Education::class,
        ]);
    }
}
