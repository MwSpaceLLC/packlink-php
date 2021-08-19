<?php

use MwSpace\Packlink\Models\Shipment;
use PHPUnit\Framework\TestCase;

/**
 *
 * This class was developed to connect PHP frameworks with the packlink pro
 * shipping system. This library is unofficial and uses the connection protocols
 * of the web api modules. No copyright infringement.
 * Released under MIT license by MwSpace llc, srl.
 * @package mwspace/packlink-php
 * @author Aleksandr Ivanovitch
 * @license   http://www.apache.org/licenses/LICENSE-2.0.txt  Apache License 2.0
 * @copyright 2021 MwSpace llc, srl
 */
class ApiTest extends TestCase
{

    private $api;

    public function setUp(): void
    {
        parent::setUp();

        $this->api = \MwSpace\Packlink::setApiKey('');
    }

    public function testSetApiKey()
    {
        $this->assertNull(
            $this->api
        );
    }

    /**
     * @throws \MwSpace\Packlink\Exceptions\Handler
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testGetAllShipments()
    {
        $this->assertIsArray(
            Shipment::all()
        );
    }

}
