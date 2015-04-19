<?php

namespace Swm\Bundle\MailHookBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class MailhookCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        foreach ($container->findTaggedServiceIds('swm.mailhook') as $id => $tag) {
            $tag = array_pop($tag);
            if (!isset($tag['alias'])) {
                throw new \Exception('You should define an alias for all "swm.mailhook" tagged services');
            }

            $container->getDefinition('swm.mail_hook.provider.api_service')
                ->addMethodCall('setApiService', array($tag['alias'], $container->getDefinition($id)));
        }
    }
}