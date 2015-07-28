<?php

namespace Gtrias\WatchBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CreateWatcherCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('gtrias-watch:create-watcher')
            ->setDescription('Add new watcher criteria')
            ->addArgument(
                'target',
                InputArgument::REQUIRED,
                'Entity class to watcher work on'
            )
            ->addArgument(
                'property',
                InputArgument::REQUIRED,
                'The property to ask if the entity has changed'
            )
            ->addArgument(
                'service',
                InputArgument::REQUIRED,
                'The service who will launch the action'
            )
            ->addArgument(
                'action',
                InputArgument::REQUIRED,
                'The service action to be executed'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $target = $input->getArgument('target');
        $property = $input->getArgument('property');
        $service = $input->getArgument('service');
        $action = $input->getArgument('action');

        $watcherManager = $this->getContainer()->get('gtrias.watcher_manager');

        if ($watcherManager->addWatcher($target, $property, $service, $action)) {
            $output->writeln('Added watcher for ' . $target . ' on ' . $property . ' property. Calling ' . $service . ':' . $action);
        } else {
            $output->writeln('Something went wrong');
        }

    }
}
