<?php

namespace Swm\Bundle\MailHookBundle\ApiService;

use Swm\Bundle\MailHookBundle\Hook\DefaultHook;

class CampainmonitorApiService extends BaseApiService
{
    private function bindHook(array $hook)
    {
        return new DefaultHook($hook['Type'], $hook['EmailAddress'], 'campainmonitor', $hook);
    }

    public function bind()
    {
        return array_map(array($this, 'bindHook'), json_decode($this->metaData['Events']));
    }
}
