<?php

namespace Swm\Bundle\MailHookBundle\Hydrator;

use Swm\Bundle\MailHookBundle\Event\HookEventInterface;
use Swm\Bundle\MailHookBundle\Hook\HookInterface;
use Swm\Bundle\MailHookBundle\Hydrator\HydratorInterface;

class DefaultHydrator implements HydratorInterface
{
    /**
     * @param  HookInterface $apiService
     * @param  string        $entityName
     * @return mixed $entityName instance
     */
    public function hydrate(HookInterface $apiService, $entityName)
    {
        $hydratedEntity = new $entityName();

        if (!$hydratedEntity instanceof HookEventInterface) {
            throw new LogicException("Can't hydrate this event");
        }

        $hydratedEntity->setEmail($apiService->getEmail());
        $hydratedEntity->setName($apiService->getService());
        $hydratedEntity->setMetaData($apiService->getMetaData());

        return $hydratedEntity;
    }
}
