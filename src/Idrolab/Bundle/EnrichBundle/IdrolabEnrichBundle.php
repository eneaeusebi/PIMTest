<?php
namespace Idrolab\Bundle\EnrichBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class IdrolabEnrichBundle extends Bundle
{
  public function getParent() {
    return 'PimEnterpriseEnrichBundle';
  }
  
}


