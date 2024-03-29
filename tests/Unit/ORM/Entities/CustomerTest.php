<?php

namespace Tests\Unit\ORM\Entities;

use App\ORM\Entities\Customer;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    /** @var \App\ORM\Entities\Customer */
    protected $customer;
    
    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
    }
    
    /**
     * @covers \App\ORM\Entities\Customer::__construct
     * @covers \App\ORM\Entities\Customer::setData
     * @covers \App\ORM\Entities\Customer::setId
     * @covers \App\ORM\Entities\Customer::setCompany
     * @covers \App\ORM\Entities\Customer::setFirstName
     * @covers \App\ORM\Entities\Customer::setLastName
     * @covers \App\ORM\Entities\Customer::setEmail
     * @covers \App\ORM\Entities\Customer::setPhone
     * @covers \App\ORM\Entities\Customer::getId
     * @covers \App\ORM\Entities\Customer::getCompany
     * @covers \App\ORM\Entities\Customer::getFirstName
     * @covers \App\ORM\Entities\Customer::getLastName
     * @covers \App\ORM\Entities\Customer::getEmail
     * @covers \App\ORM\Entities\Customer::getPhone
     */
    public function testConstruction()
    {
        $data = [
            'id'         => 1,
            'company'    => 'BigCommerce',
            'first_name' => 'Jen',
            'last_name'  => 'James',
            'email'      => 'jen.james@gmail.com',
            'phone'      => '123456789',
        ];
        
        $this->customer = new Customer([]);
        $this->customer->setData($data);
        $this->assertEquals($data['id'], $this->customer->getId());
        $this->assertEquals($data['company'], $this->customer->getCompany());
        $this->assertEquals($data['first_name'], $this->customer->getFirstName());
        $this->assertEquals($data['last_name'], $this->customer->getLastName());
        $this->assertEquals($data['email'], $this->customer->getEmail());
        $this->assertEquals($data['phone'], $this->customer->getPhone());
    }
    
    /**
     * @covers \App\ORM\Entities\Customer::setId
     * @covers \App\ORM\Entities\Customer::setCompany
     * @covers \App\ORM\Entities\Customer::setFirstName
     * @covers \App\ORM\Entities\Customer::setLastName
     * @covers \App\ORM\Entities\Customer::setEmail
     * @covers \App\ORM\Entities\Customer::setPhone
     * @covers \App\ORM\Entities\Customer::setOrders
     * @covers \App\ORM\Entities\Customer::getId
     * @covers \App\ORM\Entities\Customer::getCompany
     * @covers \App\ORM\Entities\Customer::getFirstName
     * @covers \App\ORM\Entities\Customer::getLastName
     * @covers \App\ORM\Entities\Customer::getEmail
     * @covers \App\ORM\Entities\Customer::getPhone
     * @covers \App\ORM\Entities\Customer::getOrders
     */
    public function testSettersAndGetters()
    {
        $this->customer = new Customer([]);
        $data           = [
            'id'         => 1,
            'company'    => 'BigCommerce',
            'first_name' => 'Jen',
            'last_name'  => 'James',
            'email'      => 'jen.james@gmail.com',
            'phone'      => '123456789',
        ];
        $this->customer->setCompany($data['company'])
                       ->setFirstName($data['first_name'])
                       ->setLastName($data['last_name'])
                       ->setEmail($data['email'])
                       ->setPhone($data['phone'])
                       ->setOrders([])
                       ->setId($data['id']);
        
        $this->assertEquals($data['id'], $this->customer->getId());
        $this->assertEquals($data['company'], $this->customer->getCompany());
        $this->assertEquals($data['first_name'], $this->customer->getFirstName());
        $this->assertEquals($data['last_name'], $this->customer->getLastName());
        $this->assertEquals($data['email'], $this->customer->getEmail());
        $this->assertEquals($data['phone'], $this->customer->getPhone());
        $this->assertEquals([], $this->customer->getOrders());
    }
    
    public function testGetLifeTimeValue()
    {
        $data           = [
            'id'         => 1,
            'company'    => 'BigCommerce',
            'first_name' => 'Jen',
            'last_name'  => 'James',
            'email'      => 'jen.james@gmail.com',
            'phone'      => '123456789',
        ];
        $this->customer = new Customer($data);
        $this->assertEquals(0, $this->customer->getLifeTimeValue());
    }
}