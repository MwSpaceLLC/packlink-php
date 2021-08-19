<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here, so we don't need to manually load our classes.
|
*/

require __DIR__.'/../../../../vendor/autoload.php';

// create warehouse if not exist, later we use them for shipment.

$warehouse = \MwSpace\Packlink\Models\Warehouse::create([

])
