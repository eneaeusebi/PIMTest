<?php

namespace Idrolab\Bundle\CatalogBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @author Romain Monceau <romain@akeneo.com>
 */
class IdrolabCatalogBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'PimEnterpriseCatalogBundle';
    }
}
