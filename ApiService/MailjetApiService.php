<?php

namespace Swm\Bundle\MailHookBundle\ApiService;

use Swm\Bundle\MailHookBundle\Hook\DefaultHook;
use Swm\Bundle\MailHookBundle\SwmMailHookEvent;

class MailjetApiService extends BaseApiService
{
    private $eventAssoc = array(
        'send'     => SwmMailHookEvent::MAILHOOK_SEND,
        'deferral' => SwmMailHookEvent::MAILHOOK_DEFERRAL,
        'open'     => SwmMailHookEvent::MAILHOOK_OPEN,
        'click'    => SwmMailHookEvent::MAILHOOK_CLICK,
        'bounce'   => SwmMailHookEvent::MAILHOOK_SOFTBOUNCE,
        'blocked'  => SwmMailHookEvent::MAILHOOK_HARDBOUNCE,
        'spam'     => SwmMailHookEvent::MAILHOOK_SPAM,
        'unsub'    => SwmMailHookEvent::MAILHOOK_UNSUB,
        'typofix'  => SwmMailHookEvent::MAILHOOK_OTHER,
    );

    /**
     * @return array<HookInterface>
     */
    public function bind()
    {
        $metaData = json_decode($this->request->getContent(), true);

        $email = $metaData['email'];
        $event = $metaData['event'];

        return array(new DefaultHook($event, $email, 'mailjet', $metaData, $this->eventAssoc[$event]));
    }
}
