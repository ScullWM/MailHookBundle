<?php

namespace Swm\Bundle\MailHookBundle\Event;

interface HookEventInterface
{
    public function getEmail();

    public function setEmail($email);

    public function getName();

    public function setName($name);

    public function getMetaData();

    public function setMetaData(array $metaData = array());
}