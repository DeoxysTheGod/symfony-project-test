<?php

namespace App\Form;

use App\Entity\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
  {
    $builder
      ->add('content')
      ->add('type')
      ->add('choices', CollectionType::class, [
        'entry_type' => ChoiceTypeForm::class, // 🔥 Formulaire pour un choix
        'allow_add' => true, // 🔥 Permet d'ajouter des choix dynamiquement
        'allow_delete' => true, // 🔥 Permet de supprimer des choix
        'by_reference' => false,
        'prototype' => true, // 🔥 Permet d'utiliser un prototype pour le JS
        'prototype_name' => '__name__', // 🔥 Nom du prototype pour le JS
      ])
      ->add('save', SubmitType::class, ['label' => 'Créer la question']);
  }

  public function configureOptions(OptionsResolver $resolver): void
  {
    $resolver->setDefaults([
      'data_class' => Question::class,
    ]);
  }
}
