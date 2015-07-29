<?php
namespace Gtrias\WatchBundle\Tests\Command;

use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use Gtrias\WatchBundle\Command\ExecuteWatchersCommand;

class ExecuteWatchersCommandTest extends KernelTestCase
{
    public function testExecute()
    {
        $kernel = $this->createKernel();
        $kernel->boot();

        $application = new Application($kernel);
        $application->add(new ExecuteWatchersCommand());

        $command = $application->find('gtrias-watch:execute-watchers');

        $commandTester = new CommandTester($command);

        $commandTester->execute(array());

        // This should trigger all the watched services with its entities
        $this->assertRegExp('/All watchers executed/', $commandTester->getDisplay());
    }
}
