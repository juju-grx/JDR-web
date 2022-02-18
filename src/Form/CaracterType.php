<?php

namespace App\Form;

use App\Entity\Job;
use App\Entity\Race;
use App\Entity\Element;
use App\Entity\Caracter;
use App\Entity\TypeClass;
use App\Repository\ElementRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CaracterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('description', TextareaType::class)
            ->add('size', NumberType::class)
            ->add('level', HiddenType::class)
            ->add('health', HiddenType::class)
            ->add('strenght', IntegerType::class)
            ->add('agility', IntegerType::class)
            ->add('intelligence', IntegerType::class)
            ->add('charisma', IntegerType::class)
            ->add('constitution', IntegerType::class)
            ->add('wisdom', IntegerType::class)
            /*->add('jobs', EntityType::class, [
                'class'=> Job::class,
            ])*/
            ->add('race', EntityType::class, [
                'class'=> Race::class,
                'choice_label' => 'name'
            ])
            ->add('element', EntityType::class, [
                'class'=> Element::class,
                'query_builder' => function (ElementRepository $element){
                    return $element->createQueryBuilder('e')
                    ->where("e.level = 1 ");
                },
                'choice_label' => 'name'
            ])
            ->add('user', HiddenType::class)
            ->add('class', EntityType::class, [
                'class'=> TypeClass::class,
                'choice_label' => 'name'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Caracter::class,
        ]);
    }
}
