<?php

namespace Idrolab\Bundle\CatalogBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;
/**
 *
 * @author Romain Monceau <romain@akeneo.com>
 */
class IdrolabCatalogExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ .'/../Resources/config'));
        $loader->load('services.yml');
    }
}
