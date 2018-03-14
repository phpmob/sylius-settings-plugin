<?php

declare(strict_types=1);

namespace PhpMob\SyliusSettingsPlugin\Form\Type;

use PhpMob\SyliusSettingsPlugin\Form\DataTransformer\YamlTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class YamlType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->addModelTransformer(new YamlTransformer($options['inline_level']));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'inline_level' => 10,
            'attr' => [
                'data-code-mirror-mode' => 'yaml',
            ],
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return TextareaType::class;
    }
}
