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

try {

    // create warehouse if not exist, later we use them for shipment.
    $warehouse = Warehouse::default() ?? Warehouse::create(require 'warehouse.php'); // load data dynamic method

    // create a fake parcels array
    $parcels = require 'parcels.php';

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

//    dd($carrier);

    // create our first shipment
    $shipment = Shipment::create(require 'shipment.php'); // load data dynamic method

    echo json_encode($shipment);

} catch (\MwSpace\Packlink\Exceptions\Handler $e) {
    echo $e->getMessage();
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e->getMessage();
}
