# Carrier Service <img src="https://cdn.packlink.com/apps/giger/logos/packlink-pro.svg" width="200">

> Small PHP library for use [Packlink PRO](https://pro.packlink.it/).

These are the data that must be completed in order to have a shipment ready for payment in the packlink Pro backend. The
length of the values is not declared and many fields are optional. Such as "adult material", "insurance", "warehouse"
and other data that you can verify yourself.

### 📦 POST | Model Shipment:

```php
array:21 [▼
  "user_id" => null
  "client_id" => null
  "service" => "brt - 2 DAYS delivery"
  "carrier" => "brt"
  "service_id" => 20127
  "collection_date" => null
  "collection_time" => null
  "dropoff_point_id" => null
  "content" => "1 The adventure begins Framed poster"
  "contentvalue" => 46.61
  "content_second_hand" => false
  "shipment_custom_reference" => null
  "priority" => false
  "contentValue_currency" => "EUR"
  "from" => array:10 [▼
    "name" => "Aleksandr"
    "surname" => "Ivanovitch"
    "company" => "Brunelli"
    "street1" => "Via Kullmann, 3, Appartamento Camera 107, - Proprietà aperta H24"
    "street2" => null
    "zi p_code" => "06129"
    "city" => "Perugia"
    "state" => "Perugia"
    "country" => "IT"
    "phone" => "02 3056 7684"
    "email" => "dev@mwspace.com"
  ]
  "to" => array:10 [▼
    "name" => "Aleksandr"
    "surname" => "Ivanovitch"
    "company" => "MwSpace srl"
    "street1" => "Via camillo bozza, 14"
    "street2" => "Presso MwSpace srl"
    "zip_code" => "06073"
    "city" => "Perugia"
    "state" => "Perugia"
    "country" => "IT"
    "phone" => "02 3056 7684"
    "email" => "dev@mwspace.com"
  ]
  "additional_data" => array:11 [▼
    "postal_zone_id_from" => null
    "postal_zone_id_to" => null
    "shipping_service_name" => null
    "zip_code_id_from" => null
    "zip_code_id_to" => null
    "selectedWarehouseId" => null
    "parcel_Ids" => []
    "postal_zone_name_to" => null
    "order_id" => "11"
    "seller_user_id" => null
    "items" => array:1 [▼
      0 => array:5 [▼
        "price" => 35.38
        "title" => "The adventure begins Framed poster"
        "picture_url" => "prestashop.mwspace.ovh/4-home_default/the-adventure-begins-framed-poster.jpg"
        "quantity" => 1
        "category_name" => "Art"
      ]
    ]
  ]
  "packages" => array:1 [▼
    0 => array:4 [▼
      "width" => 20
      "height" => 20
      "length" => 20
      "weight" => 0.3
    ]
  ]
]
```

```json
{
    "user_id": null,
    "client_id": null,
    "service": "brt - 2 DAYS delivery",
    "carrier": "brt",
    "service_id": 20127,
    "collection_date": null,
    "collection_time": null,
    "dropoff_point_id": null,
    "content": "1 The adventure begins Framed poster",
    "contentvalue": 46.61,
    "content_second_hand": false,
    "shipment_custom_reference": null,
    "priority": false,
    "contentValue_currency": "EUR",
    "from": {
        "name": "Aleksandr",
        "surname": "Ivanovitch",
        "company": "Brunelli",
        "street1": "Via Kullmann, 3, Appartamento Camera 107, - Propriet\u00e0 aperta H24",
        "street2": null,
        "zi p_code": "06129",
        "city": "Perugia",
        "country": "IT",
        "phone": "02 3056 7684",
        "email": "dev@mwspace.com"
    },
    "to": {
        "name": "Aleksandr",
        "surname": "Ivanovitch",
        "company": "MwSpace srl",
        "street1": "Via camillo bozza, 14",
        "street2": "Presso MwSpace srl",
        "zip_code": "06073",
        "city": "Perugia",
        "country": "IT",
        "phone": "02 3056 7684",
        "email": "dev@mwspace.com"
    },
    "additional_data": {
        "postal_zone_id_from": null,
        "postal_zone_id_to": null,
        "shipping_service_name": null,
        "zip_code_id_from": null,
        "zip_code_id_to": null,
        "selectedWarehouseId": null,
        "parcel_Ids": [
        ],
        "postal_zone_name_to": null,
        "order_id": "11",
        "seller_user_id": null,
        "items": [
            {
                "price": 35.38,
                "title": "The adventure begins Framed poster",
                "picture_url": "prestashop.mwspace.ovh\/4-home_default\/the-adventure-begins-framed-poster.jpg",
                "quantity": 1,
                "category_name": "Art"
            }
        ]
    },
    "packages": [
        {
            "width": 20,
            "height": 20,
            "length": 20,
            "weight": 0.3
        }
    ]
}
```

