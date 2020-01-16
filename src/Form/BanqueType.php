<?php

namespace App\Form;

use App\Entity\Banque;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BanqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom')
            ->add('nom')
            ->add('region')
            ->add('departement')
            ->add('commune')
            ->add('localite')
            ->add('latitude')
            ->add('longitude')
            ->add('telephone')
            ->add('email')
            ->add('heure')
            ->add('website')
            ->add('services')
            ->add('image')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Banque::class,
        ]);
    }
}
