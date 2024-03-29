<?php

namespace Tests\Unit\ORM\Entities;

use App\ORM\Entities\Order;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /** @var \App\ORM\Entities\Order */
    protected $order;
    
    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
    }
    
    /**
     * @covers \App\ORM\Entities\Order::__construct
     * @covers \App\ORM\Entities\Order::setData
     * @covers \App\ORM\Entities\Order::setId
     * @covers \App\ORM\Entities\Order::setDate
     * @covers \App\ORM\Entities\Order::setCurrency
     * @covers \App\ORM\Entities\Order::setSubTotal
     * @covers \App\ORM\Entities\Order::setStatus
     * @covers \App\ORM\Entities\Order::setCustomerId
     * @covers \App\ORM\Entities\Order::getId
     * @covers \App\ORM\Entities\Order::getDate
     * @covers \App\ORM\Entities\Order::getCurrency
     * @covers \App\ORM\Entities\Order::getSubTotal
     * @covers \App\ORM\Entities\Order::getStatus
     * @covers \App\ORM\Entities\Order::getCustomerId
     */
    public function testConstruction()
    {
        $data        = [
            'customer_id'      => 10,
            'status'           => 'waiting',
            'subtotal_inc_tax' => 100,
            'currency_code'    => 'USD',
            'date_created'     => date('Y-m-d h:i:s'),
            'id'               => 1,
        ];
        $this->order = new Order([]);
        $this->order->setData($data);
        $this->assertEquals($data['customer_id'], $this->order->getCustomerId());
        $this->assertEquals($data['status'], $this->order->getStatus());
        $this->assertEquals($data['subtotal_inc_tax'], $this->order->getSubTotal());
        $this->assertEquals($data['currency_code'], $this->order->getCurrency());
        $this->assertEquals($data['date_created'], $this->order->getDate());
        $this->assertEquals($data['id'], $this->order->getId());
    }
    
    /**
     * @covers \App\ORM\Entities\Order::setId
     * @covers \App\ORM\Entities\Order::setDate
     * @covers \App\ORM\Entities\Order::setCurrency
     * @covers \App\ORM\Entities\Order::setSubTotal
     * @covers \App\ORM\Entities\Order::setStatus
     * @covers \App\ORM\Entities\Order::setCustomerId
     * @covers \App\ORM\Entities\Order::getId
     * @covers \App\ORM\Entities\Order::getDate
     * @covers \App\ORM\Entities\Order::getCurrency
     * @covers \App\ORM\Entities\Order::getSubTotal
     * @covers \App\ORM\Entities\Order::getStatus
     * @covers \App\ORM\Entities\Order::getCustomerId
     */
    public function testSettersAndGetters()
    {
        $this->order = new Order([]);
        $data        = [
            'customer_id'      => 10,
            'status'           => 'waiting',
            'subtotal_inc_tax' => 100,
            'currency_code'    => 'USD',
            'date_created'     => date('Y-m-d h:i:s'),
            'id'               => 1,
        ];
        $this->order->setCustomerId($data['customer_id'])
                    ->setStatus($data['status'])
                    ->setSubTotal($data['subtotal_inc_tax'])
                    ->setCurrency($data['currency_code'])
                    ->setDate($data['date_created'])
                    ->setOrderProducts([])
                    ->setId($data['id']);
        $this->assertEquals($data['customer_id'], $this->order->getCustomerId());
        $this->assertEquals($data['status'], $this->order->getStatus());
        $this->assertEquals($data['subtotal_inc_tax'], $this->order->getSubTotal());
        $this->assertEquals($data['currency_code'], $this->order->getCurrency());
        $this->assertEquals($data['date_created'], $this->order->getDate());
        $this->assertEquals($data['id'], $this->order->getId());
        $this->assertEquals([], $this->order->getOrderProducts());
    }
}