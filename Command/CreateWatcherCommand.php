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
                InputArgument::OPTIONAL,
                'Entity class to watcher work on'
            )
            ->addArgument(
                'property',
                InputArgument::OPTIONAL,
                'The property to ask if the entity has changed'
            )
            ->addArgument(
                'service',
                InputArgument::OPTIONAL,
                'The service who will launch the action'
            )
            ->addArgument(
                'action',
                InputArgument::OPTIONAL,
                'The service action to be executed'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Added');
    }
}
