<?php

namespace Danielm\DemoBundle\EventSubscriber;

use Danielm\DemoBundle\Event\UnnecessaryEvent;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class DemoSubscriber implements EventSubscriberInterface
{
    public function __construct(
        protected LoggerInterface $logger
    ) {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            UnnecessaryEvent::class => 'onUnnecessary',
        ];
    }

    public function onUnnecessary(): void
    {
        $this->logger->info('RequestSubscriber::onUnnecessary been called!');
    }
}
