<?php

namespace Swm\Bundle\MailHookBundle\Hook;

interface HookInterface
{
    public function getEvent();

    public function getEmail();

    public function getService();

    public function getMetaData();

    public function getEventDispatched();
}
