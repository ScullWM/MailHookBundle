<?php

namespace Swm\Bundle\MailHookBundle\Service;

use Swm\Bundle\MailHookBundle\ApiService\ApiServiceInterface;
use Swm\Bundle\MailHookBundle\Model as ApiServiceModel;
use Swm\Bundle\MailHookBundle\Provider\ProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

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
     * @param  RequestStack      $requestStack
     * @param  ProviderInterface $apiServiceProvider
     */
    public function __construct(RequestStack $requestStack, ProviderInterface $apiServiceProvider)
    {
        $this->request            = $requestStack->getCurrentRequest();
        $this->apiServiceProvider = $apiServiceProvider;
    }

    /**
     * @param  string $serviceName
     * @return array<HookInterface>
     */
    public function getHooksForService($serviceName)
    {
        $apiService = $this->apiServiceProvider->get($serviceName)->setRequest($this->request);

        return $apiService->bind();
    }
}
