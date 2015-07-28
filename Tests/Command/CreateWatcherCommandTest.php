<?php
namespace Gtrias\WatchBundle\Tests\Command;

use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use Gtrias\WatchBundle\Command\CreateWatcherCommand;

class CreateWatcherCommandTest extends KernelTestCase
{
    public function testExecute()
    {
        $kernel = $this->createKernel();
        $kernel->boot();

        $application = new Application($kernel);
        $application->add(new CreateWatcherCommand());

        $command = $application->find('gtrias-watch:create-watcher');

        $commandTester = new CommandTester($command);

        $commandTester->execute(
            array(
                'target' => '\ACS\ACSPanelBillingBundle\Entity',
                'property' => 'hasExpired',
                'service' => 'my.dummy.service',
                'action' => 'sendNotification',
            )
        );

        // This should add User only for admins
        $this->assertRegExp('/Added watcher for /', $commandTester->getDisplay());
    }
}
