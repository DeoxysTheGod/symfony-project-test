<?php

namespace App\Form;

use App\Entity\Choice;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChoiceTypeForm extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
  {
    $builder
      ->add('text', TextType::class, [
        'label' => 'Réponse',
        'attr' => ['class' => 'form-control']
      ])
      ->add('isCorrect', CheckboxType::class, [
        'label' => 'Bonne réponse ?',
        'required' => false,
        'attr' => ['class' => 'form-check-input']
      ]);
  }

  public function configureOptions(OptionsResolver $resolver): void
  {
    $resolver->setDefaults([
      'data_class' => Choice::class,
    ]);
  }
}
