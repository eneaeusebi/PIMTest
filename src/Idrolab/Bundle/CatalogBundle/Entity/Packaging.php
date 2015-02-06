<?php

namespace Idrolab\Bundle\CatalogBundle\Entity;

use Pim\Bundle\CustomEntityBundle\Entity\AbstractCustomEntity;

/**
 * @author Romain Monceau <romain@akeneo.com>
 */
class Packaging extends AbstractCustomEntity
{
    /** @var double */
    protected $height;

    /** @var double */
    protected $width;

    /** @var double */
    protected $depth;

    /** @var ProductValue */
    protected $value;

    /**
     * @return double
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @return double
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return double
     */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * @param double $height
     *
     * @return Packaging
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * @param double $width
     *
     * @return Packaging
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * @param double $depth
     *
     * @return Packaging
     */
    public function setDepth($depth)
    {
        $this->depth = $depth;

        return $this;
    }

    /**
     * @return ProductValue
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param ProductValue $value
     *
     * @return Packaging
     */
    public function setValue(ProductValue $value = null)
    {
        $this->value = $value;

        return $this;
    }
}
