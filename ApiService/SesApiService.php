<?php

namespace Swm\Bundle\MailHookBundle\ApiService;

use Swm\Bundle\MailHookBundle\Hook\DefaultHook;
use Swm\Bundle\MailHookBundle\SwmMailHookEvent;

class SesApiService extends BaseApiService
{
    private $eventAssoc = [
        'permanent_bounce'    => SwmMailHookEvent::MAILHOOK_HARDBOUNCE,
        'transient_bounce'    => SwmMailHookEvent::MAILHOOK_SOFTBOUNCE,
        'undetermined_bounce' => SwmMailHookEvent::MAILHOOK_SOFTBOUNCE,
        'spam_complaint'      => SwmMailHookEvent::MAILHOOK_SPAM,
        'delivery'            => SwmMailHookEvent::MAILHOOK_SEND,
    ];

    const SNS_BOUNCE    = 'Bounce';
    const SNS_COMPLAINT = 'Complaint';
    const SNS_DELIVERY  = 'Delivery';

    /**
     * @throws \Exception
     *
     * @return array<HookInterface>
     */
    public function bind()
    {
        $metaData = json_decode($this->request->getContent(), true);

        if (isset($metaData['Type']) && $metaData['Type'] == 'SubscriptionConfirmation') {
            throw new \Exception('AWS SNS Require a subscription confirmation: '.$metaData['SubscribeURL']);
        }

        $hooks = [];

        switch ($metaData['notificationType']) {
            case self::SNS_BOUNCE:
                $event = strtolower($metaData['bounce']['bounceType']).'_bounce';
                foreach ($metaData['bounce']['bouncedRecipients'] as $recipient) {
                    $hooks[] = new DefaultHook($event, $recipient['emailAddress'], 'ses', $metaData, $this->eventAssoc[$event]);
                }

                break;
            case self::SNS_COMPLAINT:
                $event = 'spam_complaint';
                foreach ($metaData['complaint']['complainedRecipients'] as $recipient) {
                    $hooks[] = new DefaultHook($event, $recipient['emailAddress'], 'ses', $metaData, $this->eventAssoc[$event]);
                }

                break;
            case self::SNS_DELIVERY:
                $event = 'delivery';
                foreach ($metaData['delivery']['recipients'] as $recipient) {
                    $hooks[] = new DefaultHook($event, $recipient, 'ses', $metaData, $this->eventAssoc[$event]);
                }

                break;
            default:
        }

        return $hooks;
    }
}
