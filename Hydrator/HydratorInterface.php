<?php

namespace Swm\Bundle\MailHookBundle\Hydrator;

use Swm\Bundle\MailHookBundle\Hook\HookInterface;

interface HydratorInterface
{
    public function hydrate(HookInterface $apiService, $entityName);
}
