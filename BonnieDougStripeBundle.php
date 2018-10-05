<?php

namespace Miracode\StripeBundle;

use Miracode\StripeBundle\DependencyInjection\Compiler\RegisterDoctrineMappingPass;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class BonnieDougStripeBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        \Stripe\Stripe::setApiKey(
            $this->container->getParameter('BonnieDoug_stripe.secret_key')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        if ($container->hasExtension('doctrine')) {
            $container->addCompilerPass(new RegisterDoctrineMappingPass());
        }
    }
}
