<?php

namespace App\Form;

use App\Entity\Race;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class RaceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('description', TextareaType::class)
            ->add('rate_physical_attack', NumberType::class, [
                'label' => false
            ])
            ->add('rate_magic_attack', NumberType::class, [
                'label' => false
            ])
            ->add('rate_physical_resistance', NumberType::class, [
                'label' => false
            ])
            ->add('rate_magic_resistance', NumberType::class, [
                'label' => false
            ])
            ->add('rate_physical_stamina', NumberType::class, [
                'label' => false
            ])
            ->add('rate_magic_stamina', NumberType::class, [
                'label' => false
            ])
            ->add('rate_speed', NumberType::class)
            ->add('max_size', NumberType::class)
            ->add('min_size', NumberType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Race::class,
        ]);
    }
}
