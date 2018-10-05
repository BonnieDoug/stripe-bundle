<?php

namespace BonnieDoug\StripeBundle\Model;

interface StripeUserInterface
{
    /**
     * @return StripeModelInterface
     */
    public function getStripeCustomer();
}
