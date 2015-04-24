<?php

namespace Swm\Bundle\MailHookBundle;

final class SwmMailHookEvent
{
    /**
     * The MAILHOOK_OPEN event occurs when a mail is Open
     * The event is an instance of Swm\Bundle\MailHookBundle\Event\MailEvent
     *
     * @var string
     */
    const MAILHOOK_OPEN = 'swm.mail_hook.event.open';

    /**
     * The MAILHOOK_SEND event occurs when a mail is send
     * The event is an instance of Swm\Bundle\MailHookBundle\Event\MailEvent
     *
     * @var string
     */
    const MAILHOOK_SEND = 'swm.mail_hook.event.send';

    /**
     * The MAILHOOK_CLICK event occurs when a mail is cliked
     * The event is an instance of Swm\Bundle\MailHookBundle\Event\MailEvent
     *
     * @var string
     */
    const MAILHOOK_CLICK = 'swm.mail_hook.event.click';

    /**
     * The MAILHOOK_BOUNCE event occurs when a mail is soft Bounced
     * The event is an instance of Swm\Bundle\MailHookBundle\Event\MailEvent
     *
     * @var string
     */
    const MAILHOOK_SOFTBOUNCE = 'swm.mail_hook.event.soft_bounce';

    /**
     * The MAILHOOK_BOUNCE event occurs when a mail is hard Bounced
     * The event is an instance of Swm\Bundle\MailHookBundle\Event\MailEvent
     *
     * @var string
     */
    const MAILHOOK_HARDBOUNCE = 'swm.mail_hook.event.hard_bounce';

    /**
     * The MAILHOOK_DEFERRAL event occurs when a mail is deferral
     * The event is an instance of Swm\Bundle\MailHookBundle\Event\MailEvent
     *
     * @var string
     */
    const MAILHOOK_DEFERRAL = 'swm.mail_hook.event.deferral';

    /**
     * The MAILHOOK_SPAM event occurs when a mail is delcared as spam
     * The event is an instance of Swm\Bundle\MailHookBundle\Event\MailEvent
     *
     * @var string
     */
    const MAILHOOK_SPAM = 'swm.mail_hook.event.spam';

    /**
     * The MAILHOOK_BLOCKED event occurs when a mail is blocked by user
     * The event is an instance of Swm\Bundle\MailHookBundle\Event\MailEvent
     *
     * @var string
     */
    const MAILHOOK_BLOCKED = 'swm.mail_hook.event.blocked';

    /**
     * The MAILHOOK_UNSUB event occurs when a user unsub to list
     * The event is an instance of Swm\Bundle\MailHookBundle\Event\MailEvent
     *
     * @var string
     */
    const MAILHOOK_UNSUB = 'swm.mail_hook.event.unsub';

    /**
     * The MAILHOOK_REJECT event occurs when a mail is directly rejected
     * The event is an instance of Swm\Bundle\MailHookBundle\Event\MailEvent
     *
     * @var string
     */
    const MAILHOOK_REJECT = 'swm.mail_hook.event.reject';

    /**
     * The MAILHOOK_OTHER event occurs for specials case
     * The event is an instance of Swm\Bundle\MailHookBundle\Event\MailEvent
     *
     * @var string
     */
    const MAILHOOK_OTHER = 'swm.mail_hook.event.other';
}
