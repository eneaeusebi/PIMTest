<?php

namespace Idrolab\Bundle\CatalogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Pim\Bundle\CatalogBundle\Model\AbstractProductValue;

/**
 * @author Romain Monceau <romain@akeneo.com>
 */
class ProductValue extends AbstractProductValue
{
    /** @var Brand */
    protected $brand;

    /** @var Packaging[] */
    protected $packagings;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->packagings = new ArrayCollection();
    }

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

    public function getPackagings()
    {
        return $this->packagings;
    }

    public function setPackagings(ArrayCollection $packagings)
    {
        $this->packagings = $packagings;

        return $this;
    }

    public function addPackaging(Packaging $packaging)
    {
        if (!$this->packagings->contains($packaging)) {
            $packaging->setValue($this);
            $this->packagings->add($packaging);
        }

        return $this;
    }

    public function removePackaging(Packaging $packaging)
    {
        if ($this->packagings->contains($packaging)) {
            $packaging->setValue(null);
            $this->packagings->removeElement($packaging);
        }

        return $this;
    }
}
