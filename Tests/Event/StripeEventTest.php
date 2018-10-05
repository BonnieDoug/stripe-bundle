<?php

namespace BonnieDoug\StripeBundle\Tests\Event;

use BonnieDoug\StripeBundle\Event\StripeEvent;
use BonnieDoug\StripeBundle\Stripe\StripeObjectType;
use PHPUnit\Framework\TestCase;
use Stripe\StripeObject;

class StripeEventTest extends TestCase
{
    public function testEvent()
    {
        $event = new StripeEvent(new StripeObject('test_id'));
        $this->assertEquals('test_id', $event->getEvent()->id);
    }

    public function testEventObjectData()
    {
        $object = new StripeObject();
        $object->data = new StripeObject();
        $object->data->object = new StripeObject('test_id');
        $event = new StripeEvent($object);

        $this->assertEquals('test_id', $event->getDataObject()->id);
    }

    /**
     * @expectedException BonnieDoug\StripeBundle\StripeException
     */
    public function testEventEmptyObject()
    {
        $event = new StripeEvent(new StripeObject());
        $event->getDataObject();
    }
}
