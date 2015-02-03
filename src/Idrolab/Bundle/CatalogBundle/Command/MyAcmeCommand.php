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
        $output->writeln("<info>Launch my acme command...<info>");

        $myService = $this->getContainer()->get('my_acme_service');
        /*$output->writeln(get_class($myService));
        $output->writeln($myService->getRandomValue());

        $myService2 = $this->getContainer()->get('my_acme_service_2');
        $output->writeln(get_class($myService2));
        $output->writeln($myService2->getRandomValue());*/

        $output->writeln(get_class($myService->manager));

        $output->writeln("<info>End of my acme command<info>");
    }
}
