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
 * Released, developed and maintain by MwSpace llc, srl.
 *
 */
final class Shipment extends Instance
{
    use Model;

    /**
     * @param string $status
     * @return Shipment[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \MwSpace\Packlink\Exceptions\Handler
     */
    public static function all(string $status = 'all'): array
    {
        self::$instance = new Instance;

        foreach (self::$instance->response(
            self::$instance->call('shipments', [
                'inbox' => strtoupper($status)
            ])
        )['shipments'] as $shipment) {
            self::$collect[] = new Shipment($shipment);
        }

        return self::$collect;
    }

    /**
     * @param $id
     * @return Shipment
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \MwSpace\Packlink\Exceptions\Handler
     */
    public static function find($id): Shipment
    {
        self::$instance = new Instance;

        return new Shipment(
            self::$instance->response(
                self::$instance->call("shipments/$id")
            )
        );
    }

    /**
     * @return Shipment
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \MwSpace\Packlink\Exceptions\Handler
     */
    public static function first(): Shipment
    {
        return self::all()[0];
    }

    /**
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function save()
    {
        return $this->response(
            $this->post("shipments", get_object_vars($this))
        );
    }

    /**
     * @param array $data
     * @return Shipment
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \MwSpace\Packlink\Exceptions\Handler
     */
    public function update(array $data = []): Shipment
    {
        $shipment = array_replace_recursive(get_object_vars($this), $data);

        $this->response(
            $this->put("shipments/$this->id", $shipment)
        );

        return self::find($shipment['id']);
    }

    /**
     * @param $key
     * @param $value
     * @return Shipment|void
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \MwSpace\Packlink\Exceptions\Handler
     */
    public static final function where($key, $value)
    {
        foreach (self::all() as $shipment) {
            if ((string)$shipment->$key === (string)$value) {
                return self::find($shipment->id);
            }
        }
    }

    /**
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete()
    {
        return $this->response(
            $this->remove("shipments", ['references' => [$this->id]])
        );
    }

    /**
     * @param array|null $data
     * @throws \MwSpace\Packlink\Exceptions\Handler
     */
    public function __construct(array $data = null)
    {
        parent::__construct();

        foreach ($data as $key => $value) {

            if ($key === 'packlink_reference' || $key === 'reference') {
                $this->id = $value;
            }

            $this->$key = $value;
        }
    }

    /** @var  $collect Shipment[] * */
    private static $collect = [];

    /**
     * @var
     */
    public
        $id,
        $carrier,
        $packlink_reference,
        $service,
        $service_id,
        $collection_date,
        $collection_time,
        $adult_signature,
        $insurance,
        $print_in_store_selected,
        $proof_of_delivery,
        $additional_data,
        $content,
        $content_second_hand,
        $contentvalue,
        $currency,
        $from,
        $packages,
        $to;

}
