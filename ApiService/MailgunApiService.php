<?php

namespace Swm\Bundle\MailHookBundle\ApiService;

use Swm\Bundle\MailHookBundle\Hook\DefaultHook;

class MailgunApiService extends BaseApiService
{
    private function bindHook(array $hook)
    {
        return new DefaultHook($hook['event'], $hook['recipient'], 'mailgun', $hook);
    }

    public function bind()
    {
        return [$this->bindHook($this->metaData)];
    }
}
