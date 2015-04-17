<?php

namespace Swm\Bundle\MailHookBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\Security\Core\User\UserInterface;

class UserMailHookEvent extends MailHookEvent implements HookEventInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var UserInterface
     */
    private $user;

    /**
     * @var array Direct metadata from the mail provider
     */
    private $metaData;

    /**
     * @param string        $name
     * @param UserInterface $user
     * @param array         $metaData
     */
    public function __construct(UserInterface $user  = null, $name  = null, array $metaData = array())
    {
        $this->name     = $name;
        $this->user     = $user;
        $this->metaData = $metaData;
    }

    /**
     * Gets the value of user.
     *
     * @return UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Sets the value of user.
     *
     * @param UserInterface $user the user
     *
     * @return this
     */
    public function setUser(UserInterface $user)
    {
        $this->user = $user;

        return $this;
    }
}
