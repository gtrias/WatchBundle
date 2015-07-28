<?php

namespace Gtrias\WatchBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ExecuteWatchersCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('gtrias-watch:execute-watchers')
            ->setDescription('Look for active watcher and execute them')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $watcherManager = $this->getContainer()->get('gtrias.watcher_manager');

        if ($watcherManager->executeWatchers()) {
            $output->writeln('All watchers executed');
        } else {
            $output->writeln('Something went wrong');
        }
    }
}
