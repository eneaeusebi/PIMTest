<?php

namespace Idrolab\Bundle\CatalogBundle\AttributeType;

use Pim\Bundle\CatalogBundle\AttributeType\AbstractAttributeType;
use Pim\Bundle\CatalogBundle\Model\ProductValueInterface;

/**
 * @author Romain Monceau <romain@akeneo.com>
 */
class PackagingCollectionType extends AbstractAttributeType
{
    /**
     * {@inheritdoc}
     */
    public function prepareValueFormOptions(ProductValueInterface $value)
    {
        $options = parent::prepareValueFormOptions($value);

        $options['type']          = 'idrolab_enrich_packaging';
        $options['allow_add']     = true;
        $options['prototype']     = true;
        $options['allow_delete']  = true;
        $options['by_reference']  = false;
        $options['clear_missing'] = true;
        $options['error_bubbling'] = false;

        return $options;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'idrolab_catalog_packaging_collection';
    }
}
