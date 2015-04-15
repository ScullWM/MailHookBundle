<?php

namespace Swm\Bundle\MailHookBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\Security\Core\User\UserInterface;

class UserMailHookEvent extends Event implements HookEventInterface
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
    public function __construct($name  = null, UserInterface $user  = null, array $metaData = array())
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

    /**
     * Gets the value of name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param string $name the name
     *
     * @return this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the value of metaData.
     *
     * @return array
     */
    public function getMetaData()
    {
        return $this->metaData;
    }

    /**
     * Sets the value of metaData.
     *
     * @param array $metaData the meta data
     *
     * @return this
     */
    public function setMetaData(array $metaData = array())
    {
        $this->metaData = $metaData;

        return $this;
    }
}
