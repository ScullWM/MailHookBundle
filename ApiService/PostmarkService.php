<?php

namespace Swm\Bundle\MailHookBundle\ApiService;

use Swm\Bundle\MailHookBundle\Hook\DefaultHook;
use Swm\Bundle\MailHookBundle\SwmMailHookEvent;

class PostmarkService extends BaseApiService
{
    private $eventAssoc = array(
        'SoftBounce' => SwmMailHookEvent::MAILHOOK_SOFTBOUNCE,
        'HardBounce' => SwmMailHookEvent::MAILHOOK_HARDBOUNCE,
        'SpamComplaint' => SwmMailHookEvent::MAILHOOK_SPAM,
        'Unsubscribe' => SwmMailHookEvent::MAILHOOK_UNSUB,
        'Transient' => SwmMailHookEvent::MAILHOOK_DEFERRAL,
        'Blocked' => SwmMailHookEvent::MAILHOOK_REJECT,
    );

    /**
     * @return array<HookInterface>
     */
    public function bind()
    {
        $metaData = json_decode($this->request->getContent(), true);

        $hooks = [];
        $hooks[] = new DefaultHook($metaData['Type'], $metaData['Email'], 'postmark', $metaData, $this->eventAssoc[$metaData['Type']]);

        return $hooks;
    }
}
