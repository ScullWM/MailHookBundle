<?php

namespace Swm\Bundle\MailHookBundle\Hydrator;

use FOS\UserBundle\Model\UserManagerInterface;
use Swm\Bundle\MailHookBundle\Event\HookEventInterface;
use Swm\Bundle\MailHookBundle\Hook\HookInterface;
use Swm\Bundle\MailHookBundle\Hydrator\HydratorInterface;

class FosUserHydrator implements HydratorInterface
{
    /**
     * @var UserManagerInterface
     */
    private $userManager;

    /**
     * @param UserManagerInterface $userManager
     */
    public function __construct(UserManagerInterface $userManager)
    {
        $this->userManager = $userManager;
    }

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
        $hydratedEntity->setName($apiService->getName());
        $hydratedEntity->setMetaData($apiService->getMetaData());

        $user = $this->userManager->findUserByEmail($apiService->getEmail());
        $hydratedEntity->setUser($user);

        return $hydratedEntity;
    }
}
