<?php namespace MwSpace\Packlink\Models;

use MwSpace\Packlink\Instance;
use MwSpace\Packlink\Traits\Model;

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
 * Released, developed and maintain by MwSpace llc, srl .
 *
 */
final class Warehouse extends Instance
{
    use Model;

    /**
     * @param string $id
     * @return Warehouse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \MwSpace\Packlink\Exceptions\Handler
     */
    public final static function find(string $id): Warehouse
    {
        self::$instance = new Instance;

        return new Warehouse(
            self::$instance->response(
                self::$instance->call("clients/warehouses/$id")
            )
        );
    }

    /**
     * @param $key
     * @param $value
     * @return Warehouse|void
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \MwSpace\Packlink\Exceptions\Handler
     */
    public static final function where($key, $value)
    {
        foreach (self::all() as $warehouse) {
            if ((string)$warehouse->$key === (string)$value) {
                return self::find($warehouse->id);
            }
        }
    }

    /**
     * @return Warehouse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \MwSpace\Packlink\Exceptions\Handler
     */
    public static function first(): Warehouse
    {
        return self::all()[0];
    }

    /**
     * @return Warehouse|void
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \MwSpace\Packlink\Exceptions\Handler
     */
    public static function default()
    {

        foreach (self::all() as $warehouse) {
            if ($warehouse->default_selection) {
                return $warehouse;
            }
        }
    }

    /**
     * @return Warehouse[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \MwSpace\Packlink\Exceptions\Handler
     */
    public static function all(): array
    {
        self::$instance = new Instance;

        foreach (self::$instance->response(self::$instance->call("warehouses")) as $warehouse) {
            self::$collect[] = new Warehouse($warehouse);
        }

        return self::$collect;
    }

    /**
     * @param array $data
     * @return Warehouse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \MwSpace\Packlink\Exceptions\Handler
     */
    public function update(array $data = []): Warehouse
    {
        $warehouse = array_replace_recursive(get_object_vars($this), $data);

        $this->response(
            $this->put("clients/warehouses/$this->id", $warehouse)
        );

        return self::find($warehouse['id']);
    }

    /**
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function save()
    {
        return $this->response(
            $this->post("clients/warehouses", get_object_vars($this))
        );
    }

    /**
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete()
    {
        return $this->response(
            $this->remove("clients/warehouses/$this->id")
        );
    }

    /**
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function setDefault()
    {
        return $this->response(
            $this->put("clients/warehouses/$this->id/default")
        );
    }

    /**
     * @param array $data
     * @throws \MwSpace\Packlink\Exceptions\Handler
     */
    public function __construct(array $data)
    {
        parent::__construct();

        foreach ($data as $key => $value) {
            if ($key !== "platform" && $key !== 'platform_country' && $key !== 'source') {
                $this->$key = $value;
            }
        }
    }

    /** @var  $collect Warehouse[] * */
    private static $collect = [];

    /**
     * @var
     */
    public
        $id,
        $alias,
        $name,
        $address,
        $postal_code_id,
        $default_selection,
        $city,
        $country,
        $postal_zone,
        $postal_code,
        $phone,
        $company,
        $surname,
        $created_at,
        $email;
}
