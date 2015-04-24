<?php

namespace Swm\Bundle\MailHookBundle\ApiService;

use Swm\Bundle\MailHookBundle\Hook\DefaultHook;
use Swm\Bundle\MailHookBundle\SwmMailHookEvent;

class MailjetApiService extends BaseApiService
{
    private $eventAssoc = [
        'send'        => SwmMailHookEvent::MAILHOOK_SEND,
        'deferral'    => SwmMailHookEvent::MAILHOOK_DEFERRAL,
        'open'        => SwmMailHookEvent::MAILHOOK_OPEN,
        'click'       => SwmMailHookEvent::MAILHOOK_CLICK,
        'bounce'      => SwmMailHookEvent::MAILHOOK_SOFTBOUNCE,
        'blocked'     => SwmMailHookEvent::MAILHOOK_HARDBOUNCE,
        'spam'        => SwmMailHookEvent::MAILHOOK_SPAM,
        'unsub'       => SwmMailHookEvent::MAILHOOK_UNSUB,
        'typofix'     => SwmMailHookEvent::MAILHOOK_OTHER,
    ];

    public function bind()
    {
        if (0 === strpos($this->request->headers->get('Content-Type'), 'application/json')) {
            $metaData = json_decode($this->request->getContent(), true);
        }

        $email = $hook['email'];
        $event = $hook['event'];

        return [new DefaultHook($event, $email, 'mailjet', $metaData)];
    }
}
