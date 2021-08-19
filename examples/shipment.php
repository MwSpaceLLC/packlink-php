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

return array(
    "carrier" => "Poste Italiane",
    "service" => "Crono Express",
    "service_id" => 20203,
    "collection_date" => "2021/08/18",
    "collection_time" => "09:00-18:30",
    "adult_signature" => false,
    "insurance" => array(
        "amount" => 0,
        "insurance_selected" => false,
    ),
    "print_in_store_selected" => false,
    "proof_of_delivery" => false,
    "additional_data" => array(
        "selectedWarehouseId" => $warehouse->id ?? null,
        "postal_zone_id_from" => "113",
        "postal_zone_name_from" => "Italia",
        "zip_code_id_from" => "AVoz8fkDQsSNgeiJ2icZ",
        "parcelIds" => array("custom-parcel-id"),
        "postal_zone_id_to" => "113",
        "postal_zone_name_to" => "Italia",
        "zip_code_id_to" => null,
    ),
    "content" => "Elettronica",
    "content_second_hand" => false,
    "contentvalue" => 35,
    "currency" => "EUR",
    "from" => array(
        "city" => "Atena",
        "country" => "IT",
        "state" => "Italia",
        "zip_code" => "06010",
        "company" => "MwSpace srl",
        "email" => "milano@mwspace.com",
        "name" => "Aleksandr",
        "phone" => "3756652884",
        "street1" => "Via camillo bozza, 14, Presso MwSpace srl",
        "surname" => "Ivanovitch",
    ),
    "packages" => require 'packages.php',
    "to" => [
        "city" => "Perugia",
        "country" => "IT",
        "state" => "Italia",
        "zip_code" => "06129",
        "company" => "Studio Brunelli Paolo",
        "email" => "Studio Brunelli Paolo",
        "name" => "Paolo",
        "phone" => "075 697 5745",
        "street1" => "Via Federico Faruffini, 2, 06129 Perugia PG",
        "surname" => "Brunelli",
    ]
);
