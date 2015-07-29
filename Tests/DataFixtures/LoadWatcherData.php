<?php
namespace Gtrias\WatchBundle\Tests\DataFixtures;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Gtrias\WatchBundle\Entity\Watcher;

class LoadWatcherData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // Adding 2 watchers
        for ($i=0; $i < 15; $i++) {
            $watcher = new Watcher();
            $watcher->setActive(true);

            $manager->persist($watcher);
            $this->addReference('watcher-' . $i, $watcher);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}

