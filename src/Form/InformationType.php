<?php

namespace App\Form;

use App\Entity\Information;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class InformationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pays', ChoiceType::class, [
    'choices' => [ 
        'tunisie' => 1,
        
    ],])
            ->add('gouvernat', ChoiceType::class, [
    'choices' => [ 
        'selectionner Gouvernat' => 1,
        'Ariana' => 2,
        'beja' => 3,
       
                'Bizerte' =>4 ,
                                'Gabes' =>5 ,
                'Gafsa' =>6 ,
                'Jendouba' =>7 ,
                'Karouan' =>8,
                'Kassrine' =>9 ,
                'Kebili' =>10 ,
                'le Kef' =>11 ,
                'Mehdia' =>12 ,
                'Mednine' =>13 ,
                'Mounastir' =>14 ,
                'Nabeul' =>15 ,
                'Sfax' =>16 ,
                'Sidi Bouzaid' =>17 ,
                'Siliana' =>18 ,
                'Sousse' =>19 ,
                'Tataoun' =>20 ,
                'Touzer' =>21 ,
                'Tunis' =>22 ,
                'Zaghwan' =>23 ,

    ],])
            ->add('ville',TextType::class,array(
            'required' => true,
            'attr' => array(
              'placeholder' => 'Les villes',
                'class' => 'form-control'
            )))
            ->add('postal',IntegerType::class,array(
            'required' => true,
            'attr' => array(
              'placeholder' => 'Le code Postal',
                'class' => 'form-control'
            )))
            ->add('adress',TextType::class,array(
            'required' => true,
            'attr' => array(
              'placeholder' => 'L adress',
                'class' => 'form-control'
            )))
            ->add('name',FileType::class,array(
               'label'=>'Telecharger votre CV'
            )
             )
            ->add('experience', ChoiceType::class, [
    'choices' => [ 
        'debutant' => 1,
                '0 à 1 an' => 1,
        '1 à 3 ans' => 1,
        '3 à 5 ans' => 1,
        '5 à 10 ans' => 1,
        'plus de 10 ans' => 1,

    ],])
            ->add('entreprise',TextType::class,array(
            'required' => true,
            'attr' => array(
              'placeholder' => 'L entreprise',
                'class' => 'form-control'
            )))
            ->add('mission',TextType::class,array(
            'required' => true,
            'attr' => array(
              'placeholder' => 'Les Missions',
                'class' => 'form-control'
            )))
           
            ->add('description',TextareaType::class,array(
            'required' => true,
            'attr' => array(
              'placeholder' => 'poste',
                'class' => 'form-control'
            )))
            ->add('niveau_etude', ChoiceType::class, [
    'choices' => [ 
        'Selectionner le niveau d etude' => 1,
                'Diplome non valide' => 1,
        'Bac Professionnel ,BEP, CAP' => 1,
        'Expert, Recherche' => 1,
        'Doctorat,PHD' => 1,
        'Ingenieur' => 1,
        'Licence Bac+3' => 1,
        'Lycée,Niveau Bac' => 1,
        'Bac Non Valide' => 1,
        'Etudiant' => 1,
        'DUT ,BTS,Bac+2' => 1,
        'Maitrise,Bac+4' => 1,
        'Master,Bac+5' => 1,

    ],])
            ->add('specialite',TextType::class,array(
            'required' => true,
            'attr' => array(
              'placeholder' => 'la specialite',
                'class' => 'form-control'
            )))
            ->add('universite',TextType::class,array(
            'required' => true,
            'attr' => array(
              'placeholder' => 'L universite',
                'class' => 'form-control'
            )))
            
           
            ->add('etude',TextType::class,array(
            'required' => true,
            'attr' => array(
              'placeholder' => 'le Niveau d etude',
                'class' => 'form-control'
            )))
            ->add('langue',TextType::class,array(
            'required' => true,
            'attr' => array(
              'placeholder' => 'les Langues',
                'class' => 'form-control'
            )))
            ->add('competences',TextareaType::class,array(
            'required' => true,
            'attr' => array(
              'placeholder' => 'Les Competences',
                'class' => 'form-control'
            )))   
                 
            ->add('submit',SubmitType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Information::class,
        ]);
    }
}
