<?php

namespace BonnieDoug\StripeBundle\Tests\Mock;

use BonnieDoug\StripeBundle\Model\StripeModelInterface;
use BonnieDoug\StripeBundle\Transformer\TransformerInterface;
use Stripe\StripeObject;

class TransformerMock implements TransformerInterface
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
    )
    {
        // TODO: Implement transform() method.
    }
}
