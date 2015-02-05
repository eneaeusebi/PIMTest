<?php

namespace Idrolab\Bundle\CatalogBundle\Entity;

use Pim\Bundle\CustomEntityBundle\Entity\AbstractCustomEntity;

/**
 * @author Romain Monceau <romain@akeneo.com>
 */
class Brand extends AbstractCustomEntity
{
    /** @var string */
    protected $label;

    /** @var string */
    protected $description;

    /**
     * @param string $description
     *
     * @return Brand
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $label
     *
     * @return Brand
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }
}
