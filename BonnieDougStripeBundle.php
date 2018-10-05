<?php

namespace BonnieDoug\StripeBundle;

use BonnieDoug\StripeBundle\DependencyInjection\Compiler\RegisterDoctrineMappingPass;
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
            $this->container->getParameter('bonnie_doug_stripe.secret_key')
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
