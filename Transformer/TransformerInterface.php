<?php

namespace BonnieDoug\StripeBundle\Transformer;

use BonnieDoug\StripeBundle\Model\StripeModelInterface;
use Stripe\StripeObject;

interface TransformerInterface
{
    /**
     * Transform stripe object into model
     *
     * @param StripeObject $stripeObject
     * @param StripeModelInterface $model
     *
     * @return void
     */
    public function transform(
        StripeObject $stripeObject,
        StripeModelInterface $model
    );
}
