<?php

namespace Swm\Bundle\MailHookBundle\Provider;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException;

class ApiServiceProvider implements ProviderInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @var array
     */
    private $apiServiceAllowed;

    /**
     * @param  ContainerInterface $container
     * @param  array              $apiServiceAllowed
     */
    public function __construct(ContainerInterface $container, array $apiServiceAllowed = array())
    {
        $this->container         = $container;
        // Eumh eumh, I could get it by myself :p
        $this->apiServiceAllowed = $apiServiceAllowed;
    }

    /**
     * @param  string $apiServiceName
     * @return ApiServiceInterface
     */
    public function get($apiServiceName)
    {
        if (!in_array($apiServiceName, $this->apiServiceAllowed)) {
            throw new LogicException("This api service is not allowed");
        }

        if (!$this->container->has('swm.mail_hook.api_service.' . $this->sanitize($apiServiceName))) {
            throw new ServiceNotFoundException($this->sanitize($apiServiceName));
        }

        return $this->container->get('swm.mail_hook.api_service.' . $this->sanitize($apiServiceName));
    }

    /**
     * @param  string $apiServiceName
     * @return string
     */
    private function sanitize($apiServiceName)
    {
        return strtolower($apiServiceName);
    }
}
