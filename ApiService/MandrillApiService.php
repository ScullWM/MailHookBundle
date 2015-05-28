<?php

namespace Swm\Bundle\MailHookBundle\ApiService;

use Swm\Bundle\MailHookBundle\Hook\DefaultHook;
use Swm\Bundle\MailHookBundle\SwmMailHookEvent;

class MandrillApiService extends BaseApiService
{
    private $eventAssoc = array(
        'send'        => SwmMailHookEvent::MAILHOOK_SEND,
        'deferral'    => SwmMailHookEvent::MAILHOOK_DEFERRAL,
        'open'        => SwmMailHookEvent::MAILHOOK_OPEN,
        'click'       => SwmMailHookEvent::MAILHOOK_CLICK,
        'soft_bounce' => SwmMailHookEvent::MAILHOOK_SOFTBOUNCE,
        'hard_bounce' => SwmMailHookEvent::MAILHOOK_HARDBOUNCE,
        'spam'        => SwmMailHookEvent::MAILHOOK_SPAM,
        'unsub'       => SwmMailHookEvent::MAILHOOK_UNSUB,
        'reject'      => SwmMailHookEvent::MAILHOOK_REJECT,
    );

    private function bindHook(array $hook)
    {
        $email = $hook['msg']['email'];
        $event = $hook['event'];
        return new DefaultHook($event, $email, 'mandrill', $hook, $this->eventAssoc[$event]);
    }

    public function bind()
    {
        if (!$this->request->get('mandrill_events')) {
            throw new \Exception("Could not find data");
        }

        $mandrillEvents = json_decode($this->request->get('mandrill_events'), true);

        return array_map([$this, 'bindHook'], $mandrillEvents);
    }
}
