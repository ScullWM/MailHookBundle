<?php

namespace Swm\Bundle\MailHookBundle\ApiService;

use Swm\Bundle\MailHookBundle\Hook\DefaultHook;

class SendgridApiService extends BaseApiService
{
    /**
     * @param  array  $hook
     * @return HookInterface
     */
    private function bindHook(array $hook)
    {
        return new DefaultHook($hook['event'], $hook['email'], 'sendgrid', $hook);
    }

    /**
     * @return array<HookInterface>
     */
    public function bind()
    {
        return array_map(array($this, 'bindHook'), $this->metaData);
    }
}
