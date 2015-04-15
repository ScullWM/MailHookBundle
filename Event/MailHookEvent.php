<?php

namespace Swm\Bundle\MailHookBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\Security\Core\User\UserInterface;

class MailHookEvent extends Event implements HookEventInterface
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $name;

    /**
     * @var array Direct metadata from the mail provider
     */
    private $metaData;

    /**
     * @param string        $email
     * @param string        $name
     * @param array         $metaData
     */
    public function __construct($email = null, $name = null, array $metaData = array())
    {
        $this->email    = $email;
        $this->name     = $name;
        $this->metaData = $metaData;
    }

    /**
     * Gets the value of email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the value of email.
     *
     * @param string $email the email
     *
     * @return this
     */
    public function setEmail($email)
    {
        $this->email = $email;

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
