<?php

namespace Tests\Integration;

use Bigcommerce\Api\Client;
use Tests\TestCase;

class ClientConnectionTest extends TestCase
{
    /** @var \Bigcommerce\Api\Client */
    protected $client;
    
    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->client = new Client();
        $this->client->configure([
                                     'store_url' => env('API_STORE_URL'),
                                     'username'  => env('API_USERNAME'),
                                     'api_key'   => env('API_KEY'),
                                 ]);
        $this->client->verifyPeer(false);
    }
    
    /**
     * Test BigCommerce client connection
     */
    public function testClientConnection()
    {
        $time = $this->client->getTime();
        $this->assertTrue($time instanceof \DateTime);
    }
}