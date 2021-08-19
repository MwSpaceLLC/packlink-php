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
