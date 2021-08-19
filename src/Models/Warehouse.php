<?php namespace MwSpace\Packlink\Models;

use MwSpace\Packlink\Instance;
use MwSpace\Packlink\Traits\Model;

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
final class Warehouse extends Instance
{
    use Model;

    /**
     * @param string $id
     * @return Warehouse
//     * @throws \GuzzleHttp\Exception\GuzzleException
//     * @throws \MwSpace\Packlink\Exceptions\Handler
     */
    public final static function find(string $id): Warehouse
    {
        $instance = new Instance;

        return new Warehouse(
            $instance->response(
                $instance->call("clients/warehouses/$id")
            )
        );
    }

    /**
     * @return Warehouse[]
//     * @throws \GuzzleHttp\Exception\GuzzleException
//     * @throws \MwSpace\Packlink\Exceptions\Handler
     */
    public static function all(): array
    {
        $instance = new Instance;

        /** @var  $warehouses Warehouse[] * */
        $warehouses = [];

        foreach ($instance->response($instance->call("warehouses")) as $warehouse) {
            $warehouses[] = new Warehouse($warehouse);
        }

        return $warehouses;
    }

    /**
     * @param array $data
     * @return mixed
//     * @throws \GuzzleHttp\Exception\GuzzleException
//     * @throws \MwSpace\Packlink\Exceptions\Handler
     */
    public function update(array $data = [])
    {
        $warehouse = array_replace_recursive(get_object_vars($this), $data);

        $this->response(
            $this->put("clients/warehouses/$this->id", $warehouse)
        );

        return self::find($warehouse['id']);
    }

    /**
     * @return mixed
//     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function save()
    {
        return $this->response(
            $this->post("clients/warehouses", get_object_vars($this))
        );
    }

    /**
     * @return mixed
//     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete()
    {
        return $this->response(
            $this->remove("clients/warehouses/$this->id")
        );
    }

    /**
     * @return mixed
//     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function setDefault()
    {
        return $this->response(
            $this->put("clients/warehouses/$this->id/default")
        );
    }

    /**
     * @param array $data
//     * @throws \MwSpace\Packlink\Exceptions\Handler
     */
    public function __construct(array $data)
    {
        parent::__construct();

        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

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
