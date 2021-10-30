<?php

namespace App\Form;

use App\Entity\Interet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class InteretType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('experience', ChoiceType::class, [
    'choices' => [ 
        'etudiant' => 1,
        'debutant' => 2,
        'responsable' => 3,
       
                'freelancer' =>4 ,
    ],])
            ->add('poste',TextType::class,array(
            'required' => true,
            'attr' => array(
              'placeholder' => 'poste',
                'class' => 'form-control'
            )))
            ->add('salaire',IntegerType::class,array(
            'required' => true,
            'attr' => array(
              'placeholder' => 'salaire',
                'class' => 'form-control'
            )))
            ->add('status', ChoiceType::class, [
    'choices' => [ 
        'Selectionner status actuel' => 1,
        'Je suis au chaumage et je cherche un travail' => 2,
        'je cherches une grande opportunite' => 3,
       
                'je suis a la recheche d un emploi' =>4 ,
    ],])
            ->add('activite', ChoiceType::class, [
    'choices' => [
        'Informatique Marketing' => 1,
        'Achat-Approvosoinement' => 2,
        'Administation' => 3,
                'Agriculture' =>4 ,
        'Agroalimentaire' => 5,
        'Aide humain et protection civil' => 6,
        'Chimie' => 7,
        'Commerce' => 8,
        'Compatibilite' => 9,
        'Design' => 10,
        'Education physique' => 11,
        'Formation' => 12,
        'Finance' => 13,

    ],])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Interet::class,
        ]);
    }
}
