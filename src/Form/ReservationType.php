<?php

namespace App\Form;

use App\Entity\Chambres;
use App\Entity\Clients;
use App\Entity\Reservation;
use App\Repository\ChambresRepository;
use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Doctrine\ORM\QueryBuilder as builder;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        
        $builder
            
            ->add('duree',IntegerType::class,[
                'attr'=>[
                    'class'=> 'form-control input-default',
                    'placeholder'=>'la durée est estimée en jours',
                    ]
                ])
            ->add('client',EntityType::class,[
                'class'=> Clients::class,
                'attr'=>[
                    'class'=> 'has-arrow form-control input-default'
                    ]
                ])
            ->add('chambre',EntityType::class, [
                'class'=> Chambres::class,
                'attr' => [
                    'class'=> 'form-control input-default',
                    ]
                ])
            ->add('date_debut',TextType::class,[
                
                'attr'=> [
                    'class'=>"form-control input-default",
                    'placeholder'=>'Saisir date au format suivant 12/02/2021'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
