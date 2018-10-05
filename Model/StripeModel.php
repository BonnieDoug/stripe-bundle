<?php

namespace BonnieDoug\StripeBundle\Model;

use BonnieDoug\StripeBundle\Annotation\StripeObjectParam;
use Symfony\Component\Serializer\Annotation\Groups;

class StripeModel implements StripeModelInterface
{
    /**
     * @StripeObjectParam(name="id")
     *
     * @var string
     */
    protected $id;

    /**
     * Retrieve stripe object ID
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
