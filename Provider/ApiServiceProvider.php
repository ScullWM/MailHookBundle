<?php

namespace Swm\Bundle\MailHookBundle\Provider;

use Swm\Bundle\MailHookBundle\ApiService\ApiServiceInterface;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException;

class ApiServiceProvider implements ProviderInterface
{
    /**
     * @var array
     */
    private $apiServiceList = [];

    /**
     * @param  string $apiServiceName
     * @return ApiServiceInterface
     */
    public function get($apiServiceName)
    {
        if (!array_key_exists($apiServiceName, $this->apiServiceList)) {
            throw new LogicException("This api service is not allowed");
        }
        return $this->apiServiceList[$apiServiceName];
    }

    /**
     * @param string              $apiServiceName
     * @param ApiServiceInterface $apiService
     */
    public function setApiService($apiServiceName, ApiServiceInterface $apiService)
    {
        $this->apiServiceList[$apiServiceName] = $apiService;
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
