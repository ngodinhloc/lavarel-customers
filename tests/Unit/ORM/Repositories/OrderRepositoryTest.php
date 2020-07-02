<?php

namespace Tests\Unit\ORM\Repositories;

use App\ORM\Entities\Customer;
use App\ORM\Repositories\OrderRepository;
use App\ORM\ResourceManager;
use Tests\TestCase;

class OrderRepositoryTest extends TestCase
{
    /** @var \App\ORM\Repositories\OrderRepository */
    protected $orderRepository;
    
    /** @var \App\ORM\ResourceManager|\PHPUnit\Framework\MockObject\MockObject */
    protected $resourceManager;
    
    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->resourceManager = $this->createMock(ResourceManager::class);
        $this->orderRepository = new OrderRepository($this->resourceManager);
    }
    
    /**
     * @covers \App\ORM\Repositories\OrderRepository::setResourceManager
     * @covers \App\ORM\Repositories\OrderRepository::getResourceManager
     */
    public function testSetterAndGetters()
    {
        $this->orderRepository->setResourceManager($this->resourceManager);
        $this->assertEquals($this->resourceManager, $this->orderRepository->getResourceManager());
    }
    
    /**
     * @covers \App\ORM\Repositories\OrderRepository::getOrders
     */
    public function testGetOrders()
    {
        $customer   = new Customer(['id' => 1]);
        $mockResult = [
            ['id' => 1],
            ['id' => 2],
        ];
        $this->resourceManager->method('getOrders')->willReturn($mockResult);
        $this->resourceManager->expects($this->exactly(1))->method('getOrders')->with($customer->getId());
        $orders = $this->orderRepository->getOrders($customer);
        $this->assertEquals($mockResult[0]['id'], $orders[0]->getId());
        $this->assertEquals($mockResult[1]['id'], $orders[1]->getId());
    }
}