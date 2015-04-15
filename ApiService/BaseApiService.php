<?php

namespace Swm\Bundle\MailHookBundle\ApiService;

use Symfony\Component\HttpFoundation\Request;

abstract class BaseApiService implements ApiServiceInterface
{
    /**
     * @var array
     */
    protected $metaData = [];

    /**
     * @var Request
     */
    protected $request;

    /**
     * @param  Request $request
     * @return $this
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;

        return $this;
    }
}
