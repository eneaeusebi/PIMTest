<?php

namespace Idrolab\Bundle\EnrichBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * @author Romain Monceau <romain@akeneo.com>
 */
class BrandType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code')
            ->add('label')
            ->add('description');
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'idrolab_enrich_brand';
    }
}
