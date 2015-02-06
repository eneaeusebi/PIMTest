<?php

namespace Idrolab\Bundle\EnrichBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Romain Monceau <romain@akeneo.com>
 */
class PackagingType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'idrolab_enrich_packaging';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code', null, ['error_bubbling' => true, 'required' => true])
            ->add('height', null, ['error_bubbling' => true])
            ->add('width', null, ['error_bubbling' => true])
            ->add('depth', null, ['error_bubbling' => true]);
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class'    => 'Idrolab\Bundle\CatalogBundle\Entity\Packaging',
                'error_bubbling' => true
            ]
        );
    }
}
