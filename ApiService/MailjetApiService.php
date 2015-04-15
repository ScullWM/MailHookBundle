<?php

namespace Swm\Bundle\MailHookBundle\ApiService;

use Swm\Bundle\MailHookBundle\Hook\DefaultHook;

class MailjetApiService extends BaseApiService
{
    public function bind()
    {
        return [new DefaultHook($metaData['event'], $metaData['email'], 'mailjet', $metaData)];
    }
}
