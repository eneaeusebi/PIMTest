<?php

namespace Idrolab\Bundle\EnrichBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;


class IdrolabEnrichExtension extends Extension
{
  
  public function load(array $config, \Symfony\Component\DependencyInjection\ContainerBuilder $container) {
    $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
    $loader->load('form_types.yml');
  }
  
  
  
  
}