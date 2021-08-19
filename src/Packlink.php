<?php namespace MwSpace;

use MwSpace\Packlink\Instance;

/**
 *
 * This class was developed to connect PHP frameworks with the packlink pro
 * shipping system. This library is unofficial and uses the connection protocols
 * of the web api modules. No copyright infringement.
 * Released under MIT license by MwSpace llc, srl.
 * @package mwspace/packlink-php
 * @author Aleksandr Ivanovitch
 * @license   http://www.apache.org/licenses/LICENSE-2.0.txt  Apache License 2.0
 * @copyright 2021 MwSpace llc, srl
 */
class Packlink extends Instance
{
    /**
     * @param string $apiKey
     */
    public static function setApiKey(string $apiKey)
    {
        self::$Apy_Key = $apiKey;
    }

}
