<?php

namespace Idrolab\Bundle\EnrichBundle\Form\Type;

use Symfony\Component\Form\AbstractType;

/**
 * @author Romain Monceau <romain@akeneo.com>
 */
class PackagingCollectionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'idrolab_enrich_packaging_collection';
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'collection';
    }
}
