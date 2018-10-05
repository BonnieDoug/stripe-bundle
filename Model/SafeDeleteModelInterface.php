<?php

namespace BonnieDoug\StripeBundle\Model;

interface SafeDeleteModelInterface
{
    /**
     * Set deleted flag
     *
     * @param bool $deleted
     *
     * @return void
     */
    public function setDeleted($deleted = true);
}
