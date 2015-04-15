<?php

namespace Swm\Bundle\MailHookBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * @Route("/webhook")
 */
class MailHookController extends Controller
{
    /**
     * @Route("/{secretSalt}/{service}/catch", name="swm_mailhook_catcher_for_service")
     * @Method({"POST","GET"})
     */
    public function catcherAction($secretSalt, $service = null)
    {
        // check if request is granted
        $this->checkSecret($secretSalt);

        $mailHookService = $this->get('swm.mail_hook.service.mail_hook');

        // get hooks
        $hooks = $mailHookService->getHooksForService($service);

        $eventHydrator = $this->get('swm.mail_hook.hydrator.default');

        foreach ($hooks as $hook) {
            $event = $eventHydrator->hydrate($hook, 'Swm\Bundle\MailHookBundle\Event\MailHookEvent');
            $this->get('event_dispatcher')->dispatch($hook->getEventDispatched(), $event);
        }

        return new Response();
    }

    private function checkSecret($secretSalt)
    {
        if ($this->container->getParameter('swm_mailhook.secretsalt') !== $secretSalt) {
            throw new AccessDeniedHttpException("You are not welcome here");
        }
    }
}
