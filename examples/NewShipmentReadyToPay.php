<?php

use MwSpace\Packlink\Models\Carrier;
use MwSpace\Packlink\Models\Shipment;
use MwSpace\Packlink\Models\Warehouse;

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
*/

require __DIR__ . '/../../../../vendor/autoload.php';

// create warehouse if not exist, later we use them for shipment.
try {

    // create a fake parcels array
    $parcels = require 'parcels.php';

    // quote carrier with sum of parcel's weight
    $carriers = Carrier::quote(
        array_sum(array_column($parcels, 'weight'))
    );

    dd($carriers->all());

    $warehouse = Warehouse::create(require 'warehouse.php'); // load data dynamic method
//
    $shipment = Shipment::create(require 'shipment.php'); // load data dynamic method

} catch (\MwSpace\Packlink\Exceptions\Handler $e) {
    return $e->getMessage();

} catch (\GuzzleHttp\Exception\GuzzleException $e) {

    return $e->getMessage();
}
