<?php

namespace Swm\Bundle\MailHookBundle\Hook;

class DefaultHook implements HookInterface
{
    /**
     * @var string
     */
    private $event;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $service;

    /**
     * @var array
     */
    private $metaData;

    /**
     * @var string
     */
    private $eventDispatched;

    /**
     * @param string $event
     * @param string $email
     * @param string $service
     * @param array  $metaData
     * @param string $eventDispatched
     */
    public function __construct($event, $email, $service, $metaData = array(), $eventDispatched)
    {
        $this->event           = $event;
        $this->email           = $email;
        $this->service         = $service;
        $this->metaData        = $metaData;
        $this->eventDispatched = $eventDispatched;
    }

    /**
     * Gets the value of event.
     *
     * @return mixed
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Sets the value of event.
     *
     * @param mixed $event the event
     *
     * @return this
     */
    public function setEvent($event)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Gets the value of email.
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the value of email.
     *
     * @param mixed $email the email
     *
     * @return this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Gets the value of service.
     *
     * @return mixed
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Sets the value of service.
     *
     * @param mixed $service the service
     *
     * @return this
     */
    public function setService($service)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Gets the value of metaData.
     *
     * @return mixed
     */
    public function getMetaData()
    {
        return $this->metaData;
    }

    /**
     * Sets the value of metaData.
     *
     * @param mixed $metaData the meta data
     *
     * @return this
     */
    public function setMetaData(array $metaData = array())
    {
        $this->metaData = $metaData;

        return $this;
    }

    /**
     * Gets the value of eventDispatched.
     *
     * @return mixed
     */
    public function getEventDispatched()
    {
        return $this->eventDispatched;
    }

    /**
     * Sets the value of eventDispatched.
     *
     * @param mixed $eventDispatched the event dispatched
     *
     * @return this
     */
    public function setEventDispatched($eventDispatched)
    {
        $this->eventDispatched = $eventDispatched;

        return $this;
    }
}
