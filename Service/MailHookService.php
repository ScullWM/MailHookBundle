<?php

namespace Swm\Bundle\MailHookBundle\Service;

use Swm\Bundle\MailHookBundle\ApiService\ApiServiceInterface;
use Swm\Bundle\MailHookBundle\Model as ApiServiceModel;
use Swm\Bundle\MailHookBundle\Provider\ProviderInterface;
use Symfony\Component\HttpFoundation\Request;

class MailHookService
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var ProviderInterface
     */
    private $apiServiceModelProvider;

    /**
     * @param  Request           $request
     * @param  ProviderInterface $apiServiceProvider
     */
    public function __construct(Request $request, ProviderInterface $apiServiceProvider)
    {
        $this->request            = $request;
        $this->apiServiceProvider = $apiServiceProvider;
    }

    /**
     * @param  string $apiService
     * @return array<HookInterface>
     */
    public function getHooksForService($serviceName)
    {
        $apiService = $this->apiServiceProvider->get($serviceName)->setRequest($this->request);

        return $apiService->bind();
    }
}
