<?php namespace MwSpace\Packlink;

use MwSpace\Packlink\Exceptions\Handler;
use MwSpace\Packlink\Traits\Http;

/**
 * @copyright 2021 | MwSpace llc, srl
 * @package mwspace/packlink-php
 * @author Aleksandr Ivanovitch
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * This class was developed to connect PHP frameworks with the packlink pro
 * shipping system. This library is unofficial and uses the connection protocols
 * of the cms. No copyright infringement.
 * Released, developed and maintain by MwSpace llc, srl.
 *
 */
class Instance
{
    use Http;

    /**
     * @var string
     */
    protected static
        $platform = 'PRO',
        $language = 'it_IT',
        $platform_country = 'IT',
        $platform_postalzone = '113',
        $source = 'module_prestashop';


    /** @var  $instance Instance * */
    protected static $instance;

    /**
     * Connection base url to packlink pro
     */
    protected const BASE_URL = 'https://api.packlink.com/';

    /**
     * Connection to cdn url to packlink pro
     */
    protected const CDN_URL = 'https://cdn.packlink.com/apps/';

    /**
     * Packlink API version
     */
    protected const API_VERSION = 'v1/';

    /**
     * @throws Handler
     */
    public function __construct()
    {
        if (!isset(self::$Apy_Key)) throw new Handler(
            "API KEY MUST BE SET AS \MwSpace\Packlink::setApiKey('YOUR_API_KEY');"
        );
    }

}
