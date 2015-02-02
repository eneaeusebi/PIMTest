<?php

use Symfony\Component\Config\Loader\LoaderInterface;
use Oro\Bundle\DistributionBundle\OroKernel;

/**
 * PIM AppKernel
 *
 * @author    Nicolas Dupont <nicolas@akeneo.com>
 * @copyright 2014 Akeneo SAS (http://www.akeneo.com)
 */
class AppKernel extends OroKernel
{
    /**
     * {@inheritdoc}
     */
    public function registerBundles()
    {
        $bundles = array();

        if (in_array($this->getEnvironment(), array('dev', 'test', 'behat'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        $oroBundles = parent::registerBundles();
        $exclude = array(
            'Oro\Bundle\ImportExportBundle\OroImportExportBundle',
            'Oro\Bundle\QueryDesignerBundle\OroQueryDesignerBundle',
            'JMS\JobQueueBundle\JMSJobQueueBundle',
            'Oro\Bundle\AddressBundle\OroAddressBundle',
            'Oro\Bundle\SoapBundle\OroSoapBundle',
            'Oro\Bundle\SyncBundle\OroSyncBundle',
            'Oro\Bundle\WorkflowBundle\OroWorkflowBundle',
            'Oro\Bundle\NotificationBundle\OroNotificationBundle',
            'Oro\Bundle\CalendarBundle\OroCalendarBundle',
            'Oro\Bundle\CronBundle\OroCronBundle',
            'Oro\Bundle\SearchBundle\OroSearchBundle',
            'Oro\Bundle\TagBundle\OroTagBundle'
        );
        foreach ($oroBundles as $bundleIndex => $bundle) {
            if (in_array(get_class($bundle), $exclude)) {
                unset($oroBundles[$bundleIndex]);
            }
        }
        $bundles = array_merge($oroBundles, $bundles);

        $pimDepBundles = array(
            // Uncomment the following line to use MongoDB implementation
            // new Doctrine\Bundle\MongoDBBundle\DoctrineMongoDBBundle(),
            new Knp\Bundle\GaufretteBundle\KnpGaufretteBundle(),
            new APY\JsFormValidationBundle\APYJsFormValidationBundle(),
            new Akeneo\Bundle\MeasureBundle\AkeneoMeasureBundle(),
            new Akeneo\Bundle\BatchBundle\AkeneoBatchBundle()
        );
        $bundles = array_merge($bundles, $pimDepBundles);

        $pimBundles = array(
            // BAP overriden bundles
            new Pim\Bundle\NavigationBundle\PimNavigationBundle(),
            new Pim\Bundle\FilterBundle\PimFilterBundle(),
            new Pim\Bundle\UserBundle\PimUserBundle(),
            new Pim\Bundle\JsFormValidationBundle\PimJsFormValidationBundle(),
            new Pim\Bundle\EntityBundle\PimEntityBundle(),

            // PIM bundles
            new Pim\Bundle\DashboardBundle\PimDashboardBundle(),
            new Pim\Bundle\InstallerBundle\PimInstallerBundle(),
            new Pim\Bundle\UIBundle\PimUIBundle(),
            new Pim\Bundle\CatalogBundle\PimCatalogBundle(),
            new Pim\Bundle\DataGridBundle\PimDataGridBundle(),
            new Pim\Bundle\TranslationBundle\PimTranslationBundle(),
            new Pim\Bundle\ImportExportBundle\PimImportExportBundle(),
            new Pim\Bundle\VersioningBundle\PimVersioningBundle(),
            new Pim\Bundle\WebServiceBundle\PimWebServiceBundle(),
            new Pim\Bundle\EnrichBundle\PimEnrichBundle(),
            new Pim\Bundle\BaseConnectorBundle\PimBaseConnectorBundle(),
            new Pim\Bundle\TransformBundle\PimTransformBundle()
        );

        $bundles = array_merge($bundles, $pimBundles);

        $enterpriseBundles = array(
            new PimEnterprise\Bundle\CatalogBundle\PimEnterpriseCatalogBundle(),
            new PimEnterprise\Bundle\EnrichBundle\PimEnterpriseEnrichBundle(),
            new PimEnterprise\Bundle\DashboardBundle\PimEnterpriseDashboardBundle(),
            new PimEnterprise\Bundle\SecurityBundle\PimEnterpriseSecurityBundle(),
            new PimEnterprise\Bundle\WorkflowBundle\PimEnterpriseWorkflowBundle(),
            new PimEnterprise\Bundle\BaseConnectorBundle\PimEnterpriseBaseConnectorBundle(),
            new PimEnterprise\Bundle\InstallerBundle\PimEnterpriseInstallerBundle(),
            new PimEnterprise\Bundle\DataGridBundle\PimEnterpriseDataGridBundle(),
            new PimEnterprise\Bundle\FilterBundle\PimEnterpriseFilterBundle(),
            new PimEnterprise\Bundle\UserBundle\PimEnterpriseUserBundle(),
            new PimEnterprise\Bundle\ImportExportBundle\PimEnterpriseImportExportBundle(),
            new PimEnterprise\Bundle\UIBundle\PimEnterpriseUIBundle(),
            new PimEnterprise\Bundle\VersioningBundle\PimEnterpriseVersioningBundle()
        );

        $bundles = array_merge($bundles, $enterpriseBundles);

        return $bundles;
    }

    /**
     * {@inheritdoc}
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');

        if (is_file($file = __DIR__.'/config/config_'.$this->getEnvironment().'_local.yml')) {
            $loader->load($file);
        }

        if (isset($this->bundleMap['DoctrineMongoDBBundle'])) {
            $loader->load(__DIR__ .'/config/config_mongodb.yml');
        }
    }
}
