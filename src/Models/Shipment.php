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
        $instance = new Instance;

        /** @var  $shipments Shipment[] * */
        $shipments = [];

        foreach ($instance->response(
            $instance->call('shipments', [
                'inbox' => strtoupper($status)
            ])
        )['shipments'] as $shipment) {
            $shipments[] = new Shipment($shipment);
        }

        return $shipments;
    }

    /**
     * @param $id
     * @return Shipment
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \MwSpace\Packlink\Exceptions\Handler
     */
    public static function find($id)
    {
        $instance = new Instance;

        return new Shipment(
            $instance->response(
                $instance->call("shipments/$id")
            )
        );
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
    public function update(array $data = [])
    {
        $shipment = array_replace_recursive(get_object_vars($this), $data);

        $this->response(
            $this->put("shipments/$this->id", $shipment)
        );

        return self::find($shipment['id']);
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

            if ($key === 'packlink_reference') {
                $this->id = $value;
            }

            $this->$key = $value;
        }
    }

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
