<?php

namespace App\Form;

use App\Entity\Element;
use App\Repository\ElementRepository;
use Doctrine\DBAL\Types\FloatType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ElementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description', TextareaType::class)
            ->add('rate_physical_attack', NumberType::class)
            ->add('rate_magic_attack', NumberType::class)
            ->add('rate_physical_resistance', NumberType::class)
            ->add('rate_magic_resistance', NumberType::class)
            ->add('rate_physical_stamina', NumberType::class)
            ->add('rate_magic_stamina', NumberType::class)
            ->add('rate_speed', NumberType::class)
            ->add('level', IntegerType::class)
            ->add('evolution', EntityType::class, [
                'class' => Element::class,
                'query_builder' => function (ElementRepository $element) use ($options){
                    $elementName = $options['element']->getName();
                    $elementLevel = $options['element']->getLevel();
                    return $element->createQueryBuilder('e')
                    ->where("e.level > $elementLevel and e.name != '$elementName'");
                },
                'choice_label' => 'name'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Element::class,
            'element' => null
        ]);
    }
}
