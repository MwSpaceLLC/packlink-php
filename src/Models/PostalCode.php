<?php namespace MwSpace\Packlink\Models;

use MwSpace\Packlink\Instance;

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
final class PostalCode extends Instance
{
    /**
     * @return PostalCode[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \MwSpace\Packlink\Exceptions\Handler
     */
    public static final function all(): array
    {
        foreach (self::$instance->response(
            self::$instance->call('locations/postalcodes', [
                'postalzone' => self::$platform_postalzone,
                'q' => self::$query ?? '',
            ])
        ) as $postalcode) {
            self::$collect[] = new PostalCode($postalcode);
        }

        return self::$collect;
    }

    /**
     * @param string $query
     * @return PostalCode[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \MwSpace\Packlink\Exceptions\Handler
     */
    public static final function get(string $query): array
    {
        self::$query = $query;

        return self::all();
    }

    /**
     * @param array $data
     * @throws \MwSpace\Packlink\Exceptions\Handler
     */
    public function __construct(array $data = [])
    {
        parent::__construct();

        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    /** @var  $collect PostalCode[] * */
    private static $collect = [];

    /**
     * @var
     */
    protected static
        $query;

}
