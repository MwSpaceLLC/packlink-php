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
$parcelIds = array();

// parcelIds must be How many are the packages
for ($i = 0; $i < count($parcels); $i++) {
    $parcelIds[] = "custom-parcel-id";
}

// parcels must be contains a id & name
foreach ($parcels as $key => $value) {
    $parcels[$key]['id'] = "custom-parcel-id";
    $parcels[$key]['name'] = "CUSTOM_PARCEL";
}

return array(
    "carrier" => $carrier->carrier_name ?? null,
    "service" => $carrier->name ?? null,
    "service_id" => $carrier->id ?? null,
    "collection_date" => $carrier->collection_date ?? null,
    "collection_time" => $carrier->collection_time ?? null,
//    "adult_signature" => false,
    "insurance" => array(
//        "amount" => 0,
        "insurance_selected" => false,
    ),
    "print_in_store_selected" => $carrier->has_print_in_store ?? false,
    "proof_of_delivery" => $carrier->has_proof_of_delivery ?? false,
    "additional_data" => array(
        "selectedWarehouseId" => $warehouse->id ?? null,
        "postal_zone_id_from" => $warehouse->postal_zone['id'] ?? null,
        "postal_zone_name_from" => $warehouse->postal_zone['translations']['it_IT'] ?? null,
//        "zip_code_id_from" => null,
        "parcelIds" => $parcelIds,
        "postal_zone_id_to" => "113",
        "postal_zone_name_to" => "Italia",
//        "zip_code_id_to" => null,
    ),
    "content" => "Elettronica",
    "content_second_hand" => false,
    "contentvalue" => 350,
    "currency" => "EUR",
    "from" => array(
        "city" => $warehouse->city ?? null,
        "country" => $warehouse->country ?? null,
        "state" => $warehouse->postal_zone['translations']['it_IT'] ?? null,
        "zip_code" => $warehouse->postal_code ?? null,
        "company" => $warehouse->company ?? null,
        "email" => $warehouse->email ?? null,
        "name" => $warehouse->name ?? null,
        "phone" => $warehouse->phone ?? null,
        "street1" => $warehouse->address ?? null,
        "surname" => $warehouse->surname ?? null,
    ),
    "packages" => $parcels,
    "to" => [
        "city" => "Corciano",
        "country" => "IT",
        "state" => "Italia",
        "zip_code" => "06073",
        "company" => "",
        "email" => "dev@mwspace.com",
        "name" => "MwSpace",
        "phone" => "02 3056 7684",
        "street1" => "Via Camillo Bozza, 14",
        "surname" => "llc",
    ]
);
