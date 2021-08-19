# Carrier Service <img src="https://cdn.packlink.com/apps/giger/logos/packlink-pro.svg" width="200">

> Small PHP library for use [Packlink PRO](https://pro.packlink.it/).

PHP Version  | Status  | Require  | version
------------ | ------- | -------- | -------
PHP >=7.0    | @Dev    | Composer | 2.0.0

[![Build Status](https://travis-ci.com/mwspace/packlink-php.svg?branch=main)](https://travis-ci.com/mwspace/packlink-php.svg?branch=main)
[![Latest Stable Version](http://poser.pugx.org/mwspace/packlink-php/v)](https://packagist.org/packages/mwspace/packlink-php) 
[![Total Downloads](http://poser.pugx.org/mwspace/packlink-php/downloads)](https://packagist.org/packages/mwspace/packlink-php) 
[![Latest Unstable Version](http://poser.pugx.org/mwspace/packlink-php/v/unstable)](https://packagist.org/packages/mwspace/packlink-php)
[![License](http://poser.pugx.org/mwspace/packlink-php/license)](https://packagist.org/packages/mwspace/packlink-php)

![image](https://user-images.githubusercontent.com/29952045/129723631-f52d3795-2033-4217-812b-46113256a62e.png)

### 🐱‍🚀 Install Library:

` composer require mwspace/packlink-php`

### 💎 Register your [account](https://auth.packlink.com/it-IT/pro/registro).

Compare prices and choose the services that best suit your needs, Manage all your orders at the same time and in one
place! Start enjoying Packlink PRO completely for free!

### 🔐 Authenticating to Packlink

Go to the settings page and request your Api Key (
See [Api Key](https://pro.packlink.it/private/settings/api-key))

### 🎉 See all [examples](https://github.com/MwSpaceLLC/packlink-php/tree/main/examples).

You can see it works correctly in the code we wrote or if you want to test it you could include this file in your
script. **PLEASE, SEE ALSO PHP UNIT TEST FOR MORE USAGE**

#### 🐱‍🏍 Start Packlink Object:

```php
use MwSpace\Packlink\Models\Stat;

\MwSpace\Packlink::setApiKey(env('YOUR_PACKLINK_API_KEY'));

$states = Stat::all(); // get all shipments states
return json_encode($states); // decode Stat object class to json
```

The class will connect via api to your packlink account (pro.packlink.it)

### 🚚 All Carriers:

```php
use MwSpace\Packlink\Models\Carrier;

private $packages = [[]];

$carriers = Carrier::ship($this->parcels);
$carriers->from(array( // get prices for parcels by zip code from => to
    'country' => 'IT',
    'zip' => '20900'
));
$carriers->to(array(
    'country' => 'IT',
    'zip' => '06073'
));
return json_encode($carriers->all()); // decode Carrier object class to json
```

The system will search for the couriers with the best price for the shipment of all parcels attached. Create method
insert many data to array. Please see all data needed at
[Parcels](https://github.com/MwSpaceLLC/packlink-php/blob/main/PARCELS.md).

### 🚚 Find Carriers:

```php
use MwSpace\Packlink\Models\Carrier;

private $parcels = [[]];

$carriers = Carrier::ship($this->parcels);
// do staff
return json_encode($carriers->find('YOUR_CARRIER_ID')); // decode Carrier object class to json
```

Please see all data needed at
[Parcels](https://github.com/MwSpaceLLC/packlink-php/blob/main/PARCELS.md).

### 🚚 Quote Carriers:

```php
use MwSpace\Packlink\Models\Carrier;

$carriers = Carrier::quote(8.5);
// do staff
return json_encode($carriers->all()); // decode Carrier object class to json
```

The system will search for the couriers with the best price for the shipment of weight.

### 📦 All Shipments:

```php
use MwSpace\Packlink\Models\Shipment;

$shipments = Shipment::all(); // get all shipments with default filter [all]
return json_encode($shipments); // decode Shipment object class to json
```

The system checks the tax code by confirming the captcha through Api Vision. Filter available:
*ALL | PENDING | READY_TO_PURCHASE | DRAFT | PROCESSING | READY_FOR_SHIPPING | TRACKING | IN_TRANSIT | OUT_FOR_DELIVERY
| DELIVERED | INCIDENT | RETURNED_TO_SENDER | ARCHIVED*

### 📦 Find Shipment:

```php
use MwSpace\Packlink\Models\Shipment;

$shipment = Shipment::find('YOUR_SHIPMENT_ID'); // find shipment by id
return json_encode($shipment); // decode Shipment object class to json
```

The system will check the status of your order, reporting useful information such as the various tracking and couriers
with collection and exchange points.

### 📦 Where Shipment:

```php
use MwSpace\Packlink\Models\Shipment;

$shipment = Shipment::where('status','READY_TO_PURCHASE');
return json_encode($shipment); // decode Shipment object class to json
```

This is only BETA. see limitation per page, try at yourself

### 📦 Create Shipment:

```php
use MwSpace\Packlink\Models\Shipment;

private $shipment = [];

$shipment = Shipment::create($this->shipment); // create new Shipment by Model Class
return json_encode($shipment); // decode Shipment object class to json
```

Create method insert many data to array. Please see all data needed at
[Shipment Model](https://github.com/MwSpaceLLC/packlink-php/blob/main/SHIPMENT-MODEL.md).

### 📦 Update Shipment:

```php
use MwSpace\Packlink\Shipment;

$shipment = Shipment::find('YOUR_SHIPMENT_ID'); // find shipment by id
$update = $shipment->update([
    "content" => "New awesome t-shirt" // update shipping data
]);
return json_encode($update); // decode Shipment object class to json
```

### 📦 Delete Shipment:

```php
use MwSpace\Packlink\Models\Shipment;

$shipment = Shipment::find('IT2021PRO0002911469'); // find shipment by id
$shipment->delete(); // delete shipping record by id if draft
```

### 🎯 All Warehouses:

```php
use MwSpace\Packlink\Warehouse;

$warehouses = Warehouse::all(); // get all warehouses
return json_encode($warehouses); // decode Warehouse object class to json
```

### 🎯 Find Warehouses:

```php
use MwSpace\Packlink\Warehouse;

$warehouse = Warehouse::find('YOUR_WAREHOUSE_ID'); // find warehouse by id
return json_encode($warehouse); // decode Warehouse object class to json
```

### 🎯 Create Warehouses:

```php
use MwSpace\Packlink\Warehouse;

private $warehouse = [];

$warehouse = Warehouse::create($this->warehouse); // create new Warehouse by Model Class
return json_encode($warehouse); // decode Warehouse object class to json
```

Create method insert many data to array. Please see all data needed at
[Warehouse Model](https://github.com/MwSpaceLLC/packlink-php/blob/main/WAREHOUSE-MODEL.md).

### 🎯 Update Warehouses:

```php
use MwSpace\Packlink\Warehouse;

$warehouse = Warehouse::find('YOUR_WAREHOUSE_ID'); // find warehouse by id
$update = $warehouse->update([
    "alias" => "New awesome t-shirt" // update warehouse data
]);
return json_encode($update); // decode Warehouse object class to json
```

### 🎯 Default Warehouses:

```php
use MwSpace\Packlink\Warehouse;

$warehouse = Warehouse::find('YOUR_WAREHOUSE_ID'); // find warehouse by id
$warehouse->setDefault(); // set default warehouse record
```

### 🎯 Delete Warehouses:

```php
use MwSpace\Packlink\Warehouse;

$warehouse = Warehouse::find('YOUR_WAREHOUSE_ID'); // find warehouse by id
$warehouse->delete(); // delete warehouse record by id if > 1
```

## Why use?

It matters Automatically import or manually create your national and international shipments.

Professionalism Professionalism Choose from a wide variety of transport services at the best prices.

Fast and flexible Fast and flexible Save time with the massive management of your shipments: print several labels at the
same time, or modify and pay for several shipments in one go.

Insurance Insurance Insurance coverage on products shipped, available for new and second hand items.

Tracking Tracking Tracking of all shipments from a single platform.

Customer service Customer service Help from our sales and customer service staff.

Good packaging protects the shipment and is one of the requirements for insurance.

[Read the 5 rules for proper packaging](https://support-pro.packlink.com/hc/it/articles/210236805).

## List Italy Shipping Carrier

ITALIAN POST

Poste Italiane shipments with Crono Express and Crono Internazionale services. Express deliveries throughout Italy and
the safety of sending with Poste Italiane. Compare rates and services on Packlink and send with Poste Italiane online
starting from € 5.59 all inclusive.

BRT

To ship with BRT, you can choose between national (such as Express and Priority 12.00) or international (such as DPD and
Euroexpress) shipping services. The cost of shipping with BRT will be discounted up to 70% with prices starting from €
10.96 all included.

TNT

Ship abroad with TNT courier starting from € 23.36 with services such as Economy Express and Express. You can send
parcels to Europe and abroad with delivery in 224/48 hours or 4/5 days.

UPS

Send by UPS courier in Italy and abroad. The UPS rates you will find on Packlink start at € 18.59 for national shipments
and € 15.61 for international shipments. You can choose between the Standard, Express or Express Saver service.

SDA

The SDA courier allows you to send small and medium-sized parcels throughout Italy with express delivery starting from
24 hours and from € 9.57. On Packlink you can send by choosing between Extra Large and Extra Large 12.00 services.

DHL

The deliveries that DHL Express offers are naturally both on the Italian territory and across the border. In both cases,
however, the service remains fundamentally the same, in terms of assistance, traceability and timing. DHL collects and
delivers in guaranteed times, and clearly specifies what the conditions are.

NEXIVE

With Nexive you can choose between the Complete, Espresso Drop Off and Espresso services. By choosing the Drop off
service, you can deliver the package to a Nexive collection point by selecting it at the time of shipment from our map.

STARPACK

For your shipments abroad, you can rely on Starpack services that allow you to send packages at affordable prices
without sacrificing quality. With Starpack, you can choose between Road Express and Air Courier services.

SKYNET

Send by Skynet courier in Italy and abroad. The Skynet rates that you will find on Packlink start at € 6.59 for national
shipments and € 13.30 for international shipments. The cost of shipping with Skynet will be discounted up to 70%.

See complete shipping carriers at [Shipping couriers](https://www.packlink.com/en-GB/couriers/).

## Search

Got to page for informational purposes only for browsers looking for keywords for this library included:
**Packlink php api**,**Packlink php sdk**,**Laravel packlink api**,**Laravel shipping api**,**Codeigniter packlink api**
,**Codeigniter shipping api**,**Symfony packlink api**,**Symfony shipping api**,**Yii Framework packlink api**,**Yii
Framework shipping api**,**CakePHP packlink api**,**CakePHP shipping api**,**Zend Framework packlink api**,**Zend
Framework shipping api**. [see more for packlink php api](https://github.com/MwSpaceLLC/packlink-php/blob/main/ROBOT.md)
.

## Contributing

Thank you for considering contributing to the MwSpace Company! The contribution can be found in
the [MwSpace Website](https://mwspace.com/it).

## Security Vulnerabilities

If you discover a security vulnerability within **mwspace/packlink-php**, please send an e-mail to Dev team
via [dev@mwspace.com](mailto:dev@mwspace.com). All security vulnerabilities will be promptly addressed.

## License

The **mwspace/packlink-php** is application programming interface licensed under
the [Apache License 2.0](http://www.apache.org/licenses/LICENSE-2.0.txt).
