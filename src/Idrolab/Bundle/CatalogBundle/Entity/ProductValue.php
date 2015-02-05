<?php

namespace Idrolab\Bundle\CatalogBundle\Entity;

use Pim\Bundle\CatalogBundle\Model\AbstractProductValue;

/**
 * @author Romain Monceau <romain@akeneo.com>
 */
class ProductValue extends AbstractProductValue
{
    /** @var Brand */
    protected $brand;

    /**
     * @param Brand $brand
     *
     * @return ProductValue
     */
    public function setBrand(Brand $brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }
}
