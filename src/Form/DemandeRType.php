<?php

namespace App\Form;

use App\Entity\DemandeR;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DemandeRType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('nombre')
            ->add('type',ChoiceType::class,[
                'choices'=>[
                    'FAMILLE'=>'FAMILLE',
                    'ENTREPRISE'=>'ENTREPRISE'
                ]
            ])
            ->add('tel')
            ->add('mail',EmailType::class)
            ->add('commentaire')
            ->add('Envoyer',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DemandeR::class,
        ]);
    }
}
