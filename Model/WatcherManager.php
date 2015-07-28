<?php
namespace Gtrias\WatchBundle\Model;

use Doctrine\ORM\EntityRepository;

use Gtrias\WatchBundle\Entity\Watcher;

class WatcherManager
{
    private $_em;

    public function __construct($em)
    {
        $this->_em = $em;
    }

    public function addWatcher($target, $property, $service, $action)
    {
        $watcher = new Watcher();
        $watcher->setTarget($target);
        $watcher->setProperty($property);
        $watcher->setService($service);
        $watcher->setAction($action);

        $this->_em->persist($watcher);
        $this->_em->flush();

        return $watcher;
    }
}
