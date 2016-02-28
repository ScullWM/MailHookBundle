<?php

namespace Swm\Bundle\MailHookBundle\ApiService;

use Swm\Bundle\MailHookBundle\Hook\DefaultHook;
use Swm\Bundle\MailHookBundle\SwmMailHookEvent;

class SparkpostApiService extends BaseApiService
{
    private $eventAssoc = array(
        'open'        => SwmMailHookEvent::MAILHOOK_OPEN,
        'click'       => SwmMailHookEvent::MAILHOOK_CLICK,

        'send'        => SwmMailHookEvent::MAILHOOK_SEND,
        'deferral'    => SwmMailHookEvent::MAILHOOK_DEFERRAL,
        'soft_bounce' => SwmMailHookEvent::MAILHOOK_SOFTBOUNCE,
        'hard_bounce' => SwmMailHookEvent::MAILHOOK_HARDBOUNCE,
        'spam'        => SwmMailHookEvent::MAILHOOK_SPAM,
        'unsub'       => SwmMailHookEvent::MAILHOOK_UNSUB,
        'reject'      => SwmMailHookEvent::MAILHOOK_REJECT,
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
        if (!$this->request->get('results')) {
            throw new \Exception("Could not find data");
        }

        $sparkpostEvents = json_decode($this->request->get('results'), true);

        return array_map([$this, 'bindHook'], $sparkpostEvents);
    }
}
