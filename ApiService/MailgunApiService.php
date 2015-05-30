<?php

namespace Swm\Bundle\MailHookBundle\ApiService;

use Swm\Bundle\MailHookBundle\Hook\DefaultHook;

class MailgunApiService extends BaseApiService
{
    /**
     * @param  array  $hook
     * @return HookInterface
     */
    private function bindHook(array $hook)
    {
        return new DefaultHook($hook['event'], $hook['recipient'], 'mailgun', $hook);
    }

    /**
     * @return array<HookInterface>
     */
    public function bind()
    {
        return array($this->bindHook($this->metaData));
    }
}
