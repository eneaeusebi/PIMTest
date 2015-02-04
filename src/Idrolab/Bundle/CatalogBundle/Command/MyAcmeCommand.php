<?php

namespace Idrolab\Bundle\CatalogBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 *
 * @author Romain Monceau <romain@akeneo.com>
 */
class MyAcmeCommand extends ContainerAwareCommand
{

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('acme:service');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
//        $output->writeln("<info>Launch my acme command...<info>");
//
//        $myService = $this->getContainer()->get('my_acme_service');
//        $output->writeln(get_class($myService));
//        $output->writeln($myService->getRandomValue());
//
//        $myService2 = $this->getContainer()->get('my_acme_service_2');
//        $output->writeln(get_class($myService2));
//        $output->writeln($myService2->getRandomValue());
//
//        $output->writeln(get_class($myService->manager));
//
//        $output->writeln("<info>End of my acme command<info>");
        
        $am = $this->getContainer()->get('pim_catalog.manager.attribute');
        // create an attribute
        $attribute = $am->createAttribute('pim_catalog_text');
        $attribute->setCode('title');
        $output->writeln(get_class($attribute));
        $this->saveAttribute($attribute);
        
        $attribute_option = $am->createAttribute('pim_catalog_simpleselect');
        $attribute_option->setCode('color');

        $opt1 = $am->createAttributeOption();
        $opt1->setCode('purple');
        $attribute_option->addOption($opt1);

        $opt2 = $am->createAttributeOption();
        $opt2->setCode('yellow');
        $attribute_option->addOption($opt2);

        $opt3 = $am->createAttributeOption();
        $opt3->setCode('blue');
        $attribute_option->addOption($opt3);
        
        $this->saveAttribute($attribute_option);
        $output->writeln($attribute_option->getOptions()->count());
        
        // create a localizable and scopable attribute
        $attribute_descr = $am->createAttribute('pim_catalog_textarea');
        $attribute_descr->setCode('short_description');
        $attribute_descr->setScopable(true);
        $attribute_descr->setLocalizable(true);
        
        $this->saveAttribute($attribute_descr);
        $output->writeln(get_class($attribute_descr));
        
        $attribute_sku = $am->createAttribute('pim_catalog_text');
        $attribute_sku->setCode('sku_new');
        
        $attribute_image = $am->createAttribute('pim_catalog_text');
        $attribute_image->setCode('image_name');
        $attribute_image->setScopable(true);
        $attribute_image->setLocalizable(true);
        
        $this->saveAttribute($attribute_image);
        $pm = $this->getContainer()->get('pim_catalog.manager.product');
        
        $product = $pm->createProduct();
        
        $this->addValueToProduct($pm, $attribute_sku, $product);
        $product->getValue('sku_new')->setData('PROD03');
        $this->addValueToProduct($pm, $attribute, $product);
        $product->getValue('title')->setData('Titolo del prodotto');
        
        $this->addValueToProduct($pm, $attribute_option, $product);
        $product->getValue('color')->setOption($opt2);
        echo $product->getValue('color')->getData();
        
        // locale
        $this->addValueToProduct($pm, $attribute_descr, $product);
        $product->getValue('short_description', 'en_US')->setLocale('en_US');
        $product->getValue('short_description', 'en_US')->setData('Short Description');
        $this->addValueToProduct($pm, $attribute_descr, $product);
        $product->getValue('short_description', 'it_IT')->setLocale('it_IT');
        $product->getValue('short_description', 'it_IT')->setData('Descrizione Corta');

        echo $product->getValue('short_description', 'en_US'); 
        echo '  ';
        echo $product->getValue('short_description', 'it_IT'); 
        
        // scopable
        $this->addValueToProduct($pm, $attribute_image, $product);
        $product->getValue('image_name', null, 'ecommerce')->setScope('ecommerce');
        $product->getValue('image_name', null, 'ecommerce')->setData('my_ecommerce_image');
        
        $this->addValueToProduct($pm, $attribute_image, $product);
        $product->getValue('image_name', null, 'mobile')->setScope('mobile');
        $product->getValue('image_name', null, 'mobile')->setData('my_mobile_image');

        echo '  ';
        echo $product->getValue('image_name', null, 'ecommerce')->getData(); // returns "my_ecommerce_image"

        echo '  ';
        echo $product->getValue('image_name', null, 'mobile')->getData(); // returns "my_mobile_image"

        // locale and scopable
        $this->addValueToProduct($pm, $attribute_descr, $product);
        $product->getValue('short_description', 'en_US', 'ecommerce')->setLocale('en_US');
        $product->getValue('short_description', 'en_US', 'ecommerce')->setScope('ecommerce');
        $product->getValue('short_description', 'en_US', 'ecommerce')->setData('Short Description ecommerce');
        $this->addValueToProduct($pm, $attribute_descr, $product);
        $product->getValue('short_description', 'en_US', 'mobile')->setLocale('en_US');
        $product->getValue('short_description', 'en_US', 'mobile')->setScope('mobile');
        $product->getValue('short_description', 'en_US', 'mobile')->setData('Short Description mobile');
        
        $this->addValueToProduct($pm, $attribute_descr, $product);
        $product->getValue('short_description', 'it_IT', 'ecommerce')->setLocale('it_IT');
        $product->getValue('short_description', 'it_IT', 'ecommerce')->setScope('ecommerce');
        $product->getValue('short_description', 'it_IT', 'ecommerce')->setData('Descrizione Corta ecommerce');
        $this->addValueToProduct($pm, $attribute_descr, $product);
        $product->getValue('short_description', 'it_IT', 'mobile')->setLocale('it_IT');
        $product->getValue('short_description', 'it_IT', 'mobile')->setScope('mobile');
        $product->getValue('short_description', 'it_IT', 'mobile')->setData('Descizione Corta mobile');

        echo $product->getValue('short_description', 'en_US', 'ecommerce'); 
        echo $product->getValue('short_description', 'en_US', 'mobile'); 
        echo '  ';
        echo $product->getValue('short_description', 'it_IT', 'ecommerce'); 
        echo $product->getValue('short_description', 'it_IT', 'mobile'); 
       
        $pm->save($product);
    }
    private function addValueToProduct($pm, $attribute, $product) {
        $productValue = $pm->createProductValue();
        $productValue->setAttribute($attribute);
        $product->addValue($productValue);

    }
    private function saveAttribute ($attribute){
        if (!$this->findAttribute($attribute->getCode())){
            $entity_manager = $this->getContainer()->get('doctrine.orm.entity_manager');
            $entity_manager->persist($attribute);
            $entity_manager->flush();
        }
    }
    private function findAttribute ($attribute_code){
        
        $repository_attribute = $this->getContainer()->get('pim_catalog.repository.attribute');
        return $repository_attribute->findByReference($attribute_code);
    }
}
