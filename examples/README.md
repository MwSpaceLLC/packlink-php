# Carrier Service <img src="https://cdn.packlink.com/apps/giger/logos/packlink-pro.svg" width="200">

> Small PHP library for use [Packlink PRO](https://pro.packlink.it/).

You can see it works correctly in the code we wrote or if you want to test it you could include this file in your
script. You can also test it from the command line. Also check the test units for more information on correct operation.

### Example `Without Warehouse` as default:

> First, set your apikey:

```php
\MwSpace\Packlink::setApiKey('PACKLINK_API_KEY');
```

In this demo we will pretend that we have three products in the cart for a single package shipment

> Start quotation by weight:

```php
$sum = array_sum(array_column($cartProduct, 'weight'))

$carriers = Carrier::quote($sum);
```

The products in the cart will have a weight so we add the weight and ask for the cost of shipping with a default volume
which can then be updated before confirming

> Add from and to for quote:

```php
$carriers->from(array( // get prices for parcels by zip code from => to
    'country' => $countryStoreIso, // IT
    'zip' => $zipCodeStore // 20126
));
$carriers->to(array(
    'country' => $countryCustomerIso, // IT
    'zip' => $zipCodeCustomer // 00154
));
```

We are going to get the address data where the shipment will go by also entering the data of the online store
headquarters so where the shipment will start.

> Get the carrier list:

```php
$carriers->all();
```

if you do not want to select the courier and take the first available you can use the **first()** method.

```php
$carrier = $carriers->first();
```

> Create the shipping request:

 ```php
$shipment = Shipment::create(array(
    "service" => $carrier->name,
    "carrier" => $carrier->carrier_name,
    "service_id" => $carrier->id,
    "contentvalue" => $productsTotalPrice,
    "content_second_hand" => false,
    "content" => $productsShippingDescription,
    "insurance" => array(
        "insurance_selected" => false,
    ),
    "priority" => false,
    "contentValue_currency" => "EUR",
    "from" => [
        "name" => $store_name
        "surname" => $store_surname
        "company" => $store_company
        "street1" => $store_street1
        "street2" => $store_street2
        "zip_code" => $store_zip_code
        "city" => $store_city
        "country" => $store_country
        "phone" => $store_phone
        "email" => $store_email
    ],
    "to" => [
        "name" => $customer_name
        "surname" => $customer_surname
        "company" => $customer_company
        "street1" => $customer_street1
        "street2" => $customer_street2
        "zip_code" => $customer_zip_code
        "city" => $customer_city
        "country" => $customer_country
        "phone" => $customer_phone
        "email" => $customer_email
    ],
    "packages" => array(
        'weight' => $sum, // kg
        'height' => 60, // cm
        'length' => 30, // cm
        'width' => 60, // cm
    )
));
```

In this way we are asking the system to upload a shipment ready for confirmation payment for us. So we just need to go
to the packlink pro panel to confirm the shipment.
