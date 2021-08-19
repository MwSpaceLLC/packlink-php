<?php

use MwSpace\Packlink\Models\Carrier;
use MwSpace\Packlink\Models\Shipment;
use MwSpace\Packlink\Models\Warehouse;
use PHPUnit\Framework\TestCase;

/**
 * @copyright 2021 | MwSpace llc, srl
 * @package mwspace/packlink-php
 * @author Aleksandr Ivanovitch
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * This class was developed to connect PHP frameworks with the packlink pro
 * shipping system. This library is unofficial and uses the connection protocols
 * of the cms. No copyright infringement.
 * Released, developed and maintain by MwSpace llc, srl.
 *
 */
class WarehouseTest extends TestCase
{

    private $api;

    public function setUp(): void
    {
        parent::setUp();

        $this->api = \MwSpace\Packlink::setApiKey(env('PACKLINK_API_KEY'));
    }

    public function testSetApiKey()
    {
        $this->assertNull(
            $this->api
        );
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \MwSpace\Packlink\Exceptions\Handler
     */
    public function testAllWarehouse()
    {
        $this->assertIsArray(
            Warehouse::all()
        );
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \MwSpace\Packlink\Exceptions\Handler
     */
    public function testFirstWarehouse()
    {
        $this->assertInstanceOf(Warehouse::class,
            Warehouse::first()
        );
    }

    /**
     * @throws \MwSpace\Packlink\Exceptions\Handler
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testFindWarehouse()
    {
        $shipment = Warehouse::first();

        $this->assertInstanceOf(Warehouse::class,
            Warehouse::find($shipment->id)
        );
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \MwSpace\Packlink\Exceptions\Handler
     */
    public function testCreateWarehouse()
    {
        $this->assertInstanceOf(Warehouse::class,
            Warehouse::create(require 'data/warehouse.php')
        );
    }

    /**
     * @throws \MwSpace\Packlink\Exceptions\Handler
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testUpdateWarehouse()
    {

        $shipment = Warehouse::where('default_selection', false);

        $this->assertInstanceOf(Warehouse::class,
            $shipment->update([
                'alias' => "Updated Alias From PhpUnit"
            ])
        );
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \MwSpace\Packlink\Exceptions\Handler
     */
    public function testDeleteWarehouse()
    {

        $shipment = Warehouse::where('default_selection', false);

        $this->assertNull(
            $shipment->delete()
        );
    }

}
