<?php

namespace Idrolab\Bundle\CatalogBundle\Services;

use Pim\Bundle\CatalogBundle\Manager\ProductManager;

/**
 * @author Romain Monceau <romain@akeneo.com>
 */
class MyAcmeService
{
    public $manager;

    protected $randomValue;

    public function __construct(ProductManager $manager)
    {
        $this->manager = $manager;
    }

    public function getRandomValue()
    {
        if (null === $this->randomValue) {
            $this->randomValue = rand(0, 1000000000);
        }

        return $this->randomValue;
    }
}
