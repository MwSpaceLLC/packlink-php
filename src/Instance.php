<?php namespace MwSpace\Packlink;

use MwSpace\Packlink\Exceptions\Handler;
use MwSpace\Packlink\Traits\Http;

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
class Instance
{
    use Http;

    /** --------------------------------------------------------------------------
     * | Class Setter
     * @param string $language
     * @return $this
     */
    public function setLanguage(string $language): self
    {
        self::$LANGUAGE = $language;

        return $this;
    }

    /**
     * @param string $source
     * @return $this
     */
    public function setSource(string $source): self
    {
        self::$SOURCE = $source;

        return $this;
    }

    /**
     * @param string $platform
     * @return $this
     */
    public function setPlatform(string $platform): self
    {
        self::$PLATFORM = $platform;

        return $this;
    }

    /**
     * @param string $platform_country
     * @return $this
     */
    public function setPlatformCountry(string $platform_country): self
    {
        self::$PLATFORM_COUNTRY = $platform_country;

        return $this;
    }

    /** --------------------------------------------------------------------------
     * | Class $vars */
    protected static
        $LANGUAGE = 'it_IT',
        $SOURCE = 'PRO',
        $PLATFORM = 'PRO',
        $PLATFORM_COUNTRY = 'IT';

    /** --------------------------------------------------------------------------
     * | Class const
     * Packlink base API URL.
     */
    protected const BASE_URL = 'https://api.packlink.com/';

    /**
     * Packlink cdn API URL.
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
