<?php

namespace App\Form;

use App\Entity\Chambres;
use Doctrine\DBAL\Types\BooleanType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChambresType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle',TextType::class,[
                'attr'=>[
                    'class'=> 'form-control input-default'
                    ]
                ])
            ->add('prix',NumberType::class,[
                'attr'=>[
                    'class'=> 'form-control input-default'
                    ]
                ])
            ->add('description',TextType::class,[
                'attr'=>[
                    'class'=> 'form-control input-default',
                    'style'=>'margin-bottom:2%'
                    ]
                ])
            ->add('etat',)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Chambres::class,
        ]);
    }
}
