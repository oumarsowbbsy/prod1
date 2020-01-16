<?php

namespace App\Form;

use App\Entity\Sante;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SanteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('region')
            ->add('departement')
            ->add('localite')
            ->add('type')
            ->add('nom')
            ->add('latitude')
            ->add('longitude')
            ->add('telephone')
            ->add('email')
            ->add('heure')
            ->add('website')
            ->add('service')
            ->add('image')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sante::class,
        ]);
    }
}
