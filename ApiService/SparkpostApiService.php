<?php

namespace Swm\Bundle\MailHookBundle\ApiService;

use Swm\Bundle\MailHookBundle\Hook\DefaultHook;
use Swm\Bundle\MailHookBundle\SwmMailHookEvent;

class SparkpostApiService extends BaseApiService
{
    private $eventAssoc = array(
        'open'             => SwmMailHookEvent::MAILHOOK_OPEN,
        'click'            => SwmMailHookEvent::MAILHOOK_CLICK,
        'bounce'           => SwmMailHookEvent::MAILHOOK_HARDBOUNCE,
        'spam_complaint'   => SwmMailHookEvent::MAILHOOK_SPAM,
        'list_unsubscribe' => SwmMailHookEvent::MAILHOOK_UNSUB,
        'link_unsubscribe' => SwmMailHookEvent::MAILHOOK_UNSUB,
        'delay'            => SwmMailHookEvent::MAILHOOK_DEFERRAL,
        'delivery'         => SwmMailHookEvent::MAILHOOK_SEND,
        'policy_rejection' => SwmMailHookEvent::MAILHOOK_REJECT,
        'out_of_band'      => SwmMailHookEvent::MAILHOOK_HARDBOUNCE,
    );

    /**
     * @param  array  $hook
     * @return HookInterface
     */
    private function bindHook(array $hook)
    {
        $email = $hook['msys']['rcpt_to'];
        $event = $hook['msys']['message_event']['type'];
        return new DefaultHook($event, $email, 'mandrill', $hook, $this->eventAssoc[$event]);
    }

    /**
     * @return array<HookInterface>
     */
    public function bind()
    {
        if (!$this->request->getContent()) {
            throw new \Exception("Could not find data");
        }

        $sparkpostEvents = json_decode($this->request->getContent(), true);

        return array_map([$this, 'bindHook'], $sparkpostEvents);
    }
}
