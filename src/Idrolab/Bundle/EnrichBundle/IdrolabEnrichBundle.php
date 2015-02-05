<?php

namespace Idrolab\Bundle\EnrichBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @author Romain Monceau <romain@akeneo.com>
 */
class IdrolabEnrichBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'PimEnterpriseEnrichBundle';
    }
}
