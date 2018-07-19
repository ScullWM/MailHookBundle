<?php

namespace Swm\Bundle\MailHookBundle\ApiService;

use Swm\Bundle\MailHookBundle\Hook\DefaultHook;
use Swm\Bundle\MailHookBundle\SwmMailHookEvent;

class MailgunApiService extends BaseApiService
{
    private $eventAssoc = array(
        'delivered'     => SwmMailHookEvent::MAILHOOK_SEND,
        'opened'        => SwmMailHookEvent::MAILHOOK_OPEN,
        'clicked'       => SwmMailHookEvent::MAILHOOK_CLICK,
        'complained'    => SwmMailHookEvent::MAILHOOK_SPAM,
        'unsubscribed'  => SwmMailHookEvent::MAILHOOK_UNSUB,
        'failed'        => SwmMailHookEvent::MAILHOOK_REJECT,
    );

    /**
     * @param  array  $hook
     * @return HookInterface
     */
    private function bindHook(array $hook)
    {
        return new DefaultHook($hook['event'], $hook['recipient'], 'mailgun', $hook, $this->eventAssoc[$hook['event']]);
    }
    
    /**
     * @return array<HookInterface>
     */
    public function bind()
    {
        $metaData = json_decode($this->request->getContent(), true);

        return array($this->bindHook($metaData['event-data']));
    }
}
