<?php

use MwSpace\Packlink\Models\Carrier;
use MwSpace\Packlink\Models\Shipment;
use MwSpace\Packlink\Models\Warehouse;

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

/*
|--------------------------------------------------------------------------
| Register The Auto Loader */
require __DIR__ . '/../../../../vendor/autoload.php';

\MwSpace\Packlink::setApiKey(env('PACKLINK_API_KEY'));

try {

    // create warehouse if not exist, later we use them for shipment.
    $warehouse = Warehouse::default() ?? Warehouse::create(require 'data/warehouse.php'); // load data dynamic method

    // create a fake parcels array
    $parcels = require 'data/parcels.php';

    // if u have a dimension, u can quote with a complete parcels
    // $carriers = Carrier::ship($parcels);

    // quote carrier with parcels weight sum
    $carriers = Carrier::quote(
        array_sum(array_column($parcels, 'weight'))
    );

    $carriers->from(array( // get prices for parcels by zip code from => to
        'country' => 'IT',
        'zip' => '20900'
    ));
    $carriers->to(array(
        'country' => 'IT',
        'zip' => '06073'
    ));

    // select first carrier | if u have a frontend, customer must choose by $carriers
    $carrier = $carriers->first();

    // create our first shipment
    $shipment = Shipment::create(require 'data/shipment.php'); // load data dynamic method

    echo json_encode($shipment);

} catch (\MwSpace\Packlink\Exceptions\Handler $e) {
    echo $e->getMessage();
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e->getMessage();
}
