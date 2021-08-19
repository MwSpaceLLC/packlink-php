<?php
/**
 * This class was developed to connect PHP frameworks with the packlink pro
 * shipping system. This library is unofficial and uses the connection protocols
 * of the web api modules. No copyright infringement.
 * Released under MIT license by MwSpace llc, srl.
 * @package mwspace/packlink-php
 * @author Aleksandr Ivanovitch
 * @license   http://www.apache.org/licenses/LICENSE-2.0.txt  Apache License 2.0
 * @copyright 2021 MwSpace llc, srl
 */

$parcels = require 'parcels.php';

return array(

    "service" => $carrier->name ?? null,
    "carrier" => $carrier->carrier_name ?? null,
    "service_id" => $carrier->id ?? null,
    "contentvalue" => 46.61,
    "content_second_hand" => false,
    "content" => "New Content From PhpUnit",
    "insurance" => array(
        "insurance_selected" => false,
    ),
    "priority" => false,
    "contentValue_currency" => "EUR",
    "from" => [
        "name" => "Aleksandr",
        "surname" => "Ivanovitch",
        "company" => "MwSpace srl",
        "street1" => "Via camillo bozza, 14",
        "street2" => "Presso MwSpace srl",
        "zip_code" => "06073",
        "city" => "Perugia",
        "country" => "IT",
        "phone" => "02 3056 7684",
        "email" => "dev@mwspace.com",
    ],
    "to" => [
        "name" => "Aleksandr",
        "surname" => "Ivanovitch",
        "company" => "MwSpace srl",
        "street1" => "Via camillo bozza, 14",
        "street2" => "Presso MwSpace srl",
        "zip_code" => "06073",
        "city" => "Perugia",
        "country" => "IT",
        "phone" => "02 3056 7684",
        "email" => "dev@mwspace.com",
    ],
    "packages" => require 'parcels.php'
);
