<?php

declare(strict_types=1);

namespace AppBundle\Form\Extension;

use Sylius\Bundle\CustomerBundle\Form\Type\CustomerType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class CustomerTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('taxNumber', TextType::class, [
            'label' => 'Tax Number'
        ]);
    }

    public function getExtendedType(): string
    {
        return CustomerType::class;
    }
}