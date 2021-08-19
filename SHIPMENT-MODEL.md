# Carrier Service <img src="https://cdn.packlink.com/apps/giger/logos/packlink-pro.svg" width="200">

> Small PHP library for use [Packlink PRO](https://pro.packlink.it/).

These are the data that must be completed in order to have a shipment ready for payment in the packlink Pro backend. The
length of the values is not declared and many fields are optional. Such as "adult material", "insurance", "warehouse"
and other data that you can verify yourself.

### 📦 Model Shipment:

```php
array (size=16)
  'carrier' => string 'UPS' (length=3)
  'service' => string 'Standard' (length=8)
  'service_id' => int 20132
  'collection_date' => string '2021/08/20' (length=10)
  'collection_time' => string '09:00-17:00' (length=11)
  'adult_signature' => boolean false
  'insurance' => 
    array (size=2)
      'amount' => int 1516
      'insurance_selected' => boolean true
  'print_in_store_selected' => boolean false
  'proof_of_delivery' => boolean false
  'additional_data' => 
    array (size=8)
      'selectedWarehouseId' => string '58c4b903-04c2-4f26-859c-bf512d768c0c' (length=36)
      'postal_zone_id_from' => string '113' (length=3)
      'postal_zone_name_from' => string 'Italia' (length=6)
      'zip_code_id_from' => string 'pc_it_5369' (length=10)
      'parcelIds' => 
        array (size=3)
          0 => string 'custom-parcel-id' (length=16)
          1 => string 'custom-parcel-id' (length=16)
          2 => string 'custom-parcel-id' (length=16)
      'postal_zone_id_to' => string '113' (length=3)
      'postal_zone_name_to' => string 'Italia' (length=6)
      'zip_code_id_to' => string 'pc_it_4933' (length=10)
  'content' => string 'Elettronica' (length=11)
  'contentvalue' => int 1516
  'currency' => string 'EUR' (length=3)
  'from' => 
    array (size=10)
      'city' => string 'Arci' (length=4)
      'country' => string 'IT' (length=2)
      'state' => string 'Italia' (length=6)
      'zip_code' => string '00019' (length=5)
      'company' => string 'MwSpace srl' (length=11)
      'email' => string 'email@mwspace.com' (length=17)
      'name' => string 'My First Name' (length=13)
      'phone' => string '0237901690' (length=10)
      'street1' => string 'Via libero temolo, 4 - palace Regus' (length=35)
      'surname' => string 'My Last Name' (length=12)
  'packages' => 
    array (size=3)
      0 => 
        array (size=6)
          'height' => int 20
          'id' => string 'custom-parcel-id' (length=16)
          'length' => int 20
          'name' => string 'CUSTOM_PARCEL' (length=13)
          'weight' => int 5
          'width' => int 20
      1 => 
        array (size=6)
          'height' => int 20
          'id' => string 'custom-parcel-id' (length=16)
          'length' => int 20
          'name' => string 'CUSTOM_PARCEL' (length=13)
          'weight' => int 10
          'width' => int 20
      2 => 
        array (size=6)
          'height' => int 20
          'id' => string 'custom-parcel-id' (length=16)
          'length' => int 20
          'name' => string 'CUSTOM_PARCEL' (length=13)
          'weight' => int 15
          'width' => int 20
  'to' => 
    array (size=10)
      'city' => string 'Amatrice' (length=8)
      'country' => string 'IT' (length=2)
      'state' => string 'Italia' (length=6)
      'zip_code' => string '02010' (length=5)
      'company' => string 'My Last Name' (length=12)
      'email' => string 'email@mwspace.com' (length=17)
      'name' => string 'My First Name' (length=13)
      'phone' => string '0237901690' (length=10)
      'street1' => string 'Via Libero Temolo, 4, Appartamento Camera 107, - Proprietà aperta H24' (length=70)
      'surname' => string 'My Last Name' (length=12)
```

```json
{
    "carrier": "TNT",
    "service": "Express",
    "service_id": 20945,
    "collection_date": "2021/08/20",
    "collection_time": "08:00-18:00",
    "adult_signature": false,
    "insurance": {
        "amount": 350,
        "insurance_selected": true
    },
    "print_in_store_selected": false,
    "proof_of_delivery": false,
    "additional_data": {
        "zip_code_id_from": "pc_it_5369",
        "zip_code_id_to": "pc_it_14929",
        "postal_zone_name_from": "Italia",
        "postal_zone_id_from": "113",
        "selectedWarehouseId": "58c4b903-04c2-4f26-859c-bf512d768c0c",
        "postal_zone_id_to": "113",
        "postal_zone_name_to": "Italia",
        "parcelIds": [
            "custom-parcel-id",
            "custom-parcel-id",
            "custom-parcel-id"
        ]
    },
    "content": "Elettronica",
    "content_second_hand": false,
    "contentvalue": 350,
    "currency": "EUR",
    "from": {
        "city": "Arci",
        "country": "IT",
        "state": "Italia",
        "zip_code": "00019",
        "company": "MwSpace srl",
        "email": "email@mwspace.com",
        "name": "My First Name",
        "phone": "0237901690",
        "street1": "Via libero temolo, 4 - palace Regus",
        "surname": "06073"
    },
    "packages": [
        {
            "height": 40,
            "id": "custom-parcel-id",
            "length": 40,
            "name": "custom-parcel-id",
            "weight": 5,
            "width": 40
        },
        {
            "height": 60,
            "id": "custom-parcel-id",
            "length": 60,
            "name": "custom-parcel-id",
            "weight": 15,
            "width": 60
        },
        {
            "height": 80,
            "id": "custom-parcel-id",
            "length": 80,
            "name": "custom-parcel-id",
            "weight": 25,
            "width": 80
        }
    ],
    "packlink_reference": "IT2021PRO0002918655",
    "to": {
        "city": "Corciano",
        "country": "IT",
        "state": "Italia",
        "zip_code": "06073",
        "email": "dev@mwspace.com",
        "name": "MwSpace",
        "phone": "02 3056 7684",
        "street1": "Via Camillo Bozza, 14",
        "surname": "llc"
    }
}
```

