<?php

namespace Swm\Bundle\MailHookBundle\ApiService;

use Swm\Bundle\MailHookBundle\Hook\DefaultHook;
use Swm\Bundle\MailHookBundle\SwmMailHookEvent;

class CampainmonitorApiService extends BaseApiService
{
    private $eventAssoc = array(
        'Deactivate' => SwmMailHookEvent::MAILHOOK_UNSUB,
        'Subscribe'  => SwmMailHookEvent::MAILHOOK_OTHER,
        'Update'     => SwmMailHookEvent::MAILHOOK_OTHER,
    );

    /**
     * @param  array  $hook
     * @return HookInterface
     */
    private function bindHook(array $hook)
    {
        return new DefaultHook($hook['Type'], $hook['EmailAddress'], 'campainmonitor', $hook, $this->eventAssoc[$hook['Type']]);
    }

    /**
     * @return array<HookInterface>
     */
    public function bind()
    {
        $metaData = json_decode($this->request->getContent(), true);

        return array_map(array($this, 'bindHook'), json_decode($metaData['Events']));
    }
}
