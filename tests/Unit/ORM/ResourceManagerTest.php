<?php

namespace Tests\Unit\ORM;

use App\ORM\Cache\Engines\FileCache;
use App\ORM\ResourceManager;
use Bigcommerce\Api\Client;
use Tests\TestCase;

class ResourceManagerTest extends TestCase
{
    /** @var \App\ORM\ResourceManager */
    protected $resourceManager;
    
    /** @var \Bigcommerce\Api\Client|\PHPUnit\Framework\MockObject\MockObject */
    protected $client;
    
    /** @var \App\ORM\Cache\CacheEngineInterface|\PHPUnit\Framework\MockObject\MockObject */
    protected $cacheEngine;
    
    protected $cache = true;
    
    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->client          = $this->createMock(Client::class);
        $this->cacheEngine     = $this->createMock(FileCache::class);
        $this->resourceManager = new ResourceManager($this->client, $this->cacheEngine, $this->cache);
    }
    
    /**
     * @covers \App\ORM\ResourceManager::__construct
     * @covers \App\ORM\ResourceManager::setClient
     * @covers \App\ORM\ResourceManager::setCacheEngine
     * @covers \App\ORM\ResourceManager::setCache
     * @covers \App\ORM\ResourceManager::getClient
     * @covers \App\ORM\ResourceManager::getCacheEngine
     * @covers \App\ORM\ResourceManager::isCache
     */
    public function testSettersAndGetters()
    {
        $this->resourceManager->setCache($this->cache)
                              ->setCacheEngine($this->cacheEngine)
                              ->setClient($this->client);
        $this->assertEquals($this->cache, $this->resourceManager->isCache());
        $this->assertEquals($this->cacheEngine, $this->resourceManager->getCacheEngine());
        $this->assertEquals($this->client, $this->resourceManager->getClient());
    }
    
    /**
     * @covers \App\ORM\ResourceManager::getCustomers
     * @covers \App\ORM\ResourceManager::resourcesToArray
     * @covers \App\ORM\ResourceManager::resourceToArray
     */
    public function testGetCustomers()
    {
        $limit     = 10;
        $mockKey   = md5("Customers.Limit.$limit");
        $mockCache = [];
        $this->cacheEngine->method('createKey')->willReturn($mockKey);
        $this->cacheEngine->method('getCache')->willReturn($mockCache);
        $this->cacheEngine->expects($this->exactly(1))->method('createKey')->with("Customers.Limit.$limit");
        $this->cacheEngine->expects($this->exactly(1))->method('getCache')->with($mockKey);
        
        $this->resourceManager->getCustomers($limit);
    }
    
    /**
     * @covers \App\ORM\ResourceManager::getCustomers
     * @covers \App\ORM\ResourceManager::resourcesToArray
     * @covers \App\ORM\ResourceManager::resourceToArray
     */
    public function testGetCustomersNoCache()
    {
        $limit     = 10;
        $mockKey   = md5("Customers.Limit.$limit");
        $mockCache = null;
        $this->cacheEngine->method('createKey')->willReturn($mockKey);
        $this->cacheEngine->method('getCache')->willReturn($mockCache);
        $this->cacheEngine->expects($this->exactly(1))->method('createKey')->with("Customers.Limit.$limit");
        $this->cacheEngine->expects($this->exactly(1))->method('getCache')->with($mockKey);
        $this->cacheEngine->expects($this->exactly(1))->method('writeCache');
        
        $this->resourceManager->getCustomers($limit);
    }
    
    /**
     * @covers \App\ORM\ResourceManager::getCustomer
     * @covers \App\ORM\ResourceManager::resourcesToArray
     * @covers \App\ORM\ResourceManager::resourceToArray
     */
    public function testGetCustomer()
    {
        $id        = 1;
        $mockKey   = md5("Customer.$id");
        $mockCache = [];
        $this->cacheEngine->method('createKey')->willReturn($mockKey);
        $this->cacheEngine->method('getCache')->willReturn($mockCache);
        $this->cacheEngine->expects($this->exactly(1))->method('createKey')->with("Customer.$id");
        $this->cacheEngine->expects($this->exactly(1))->method('getCache')->with($mockKey);
        
        $this->resourceManager->getCustomer($id);
    }
    
    /**
     * @covers \App\ORM\ResourceManager::getOrders
     * @covers \App\ORM\ResourceManager::resourcesToArray
     * @covers \App\ORM\ResourceManager::resourceToArray
     */
    public function testGetOrders()
    {
        $customerId = 1;
        $mockKey    = md5("Orders.CustomerId.$customerId");
        $mockCache  = [];
        $this->cacheEngine->method('createKey')->willReturn($mockKey);
        $this->cacheEngine->method('getCache')->willReturn($mockCache);
        $this->cacheEngine->expects($this->exactly(1))->method('createKey')->with("Orders.CustomerId.$customerId");
        $this->cacheEngine->expects($this->exactly(1))->method('getCache')->with($mockKey);
        
        $this->resourceManager->getOrders($customerId);
    }
    
    /**
     * @covers \App\ORM\ResourceManager::getOrderProducts
     * @covers \App\ORM\ResourceManager::resourcesToArray
     * @covers \App\ORM\ResourceManager::resourceToArray
     */
    public function testGetOrderProducts()
    {
        $orderId   = 1;
        $mockKey   = md5("OrderProducts.OrderId.$orderId");
        $mockCache = [];
        $this->cacheEngine->method('createKey')->willReturn($mockKey);
        $this->cacheEngine->method('getCache')->willReturn($mockCache);
        $this->cacheEngine->expects($this->exactly(1))->method('createKey')->with("OrderProducts.OrderId.$orderId");
        $this->cacheEngine->expects($this->exactly(1))->method('getCache')->with($mockKey);
        
        $this->resourceManager->getOrderProducts($orderId);
    }
}