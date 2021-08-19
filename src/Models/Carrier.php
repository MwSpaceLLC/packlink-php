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
final class Carrier extends Instance
{
    /**
     * @param array $parcels
     * @return Carrier
     */
    public static function ship(array $parcels): Carrier
    {
        $self = new self;
        $self::$parcels = $parcels;

        return $self;
    }

    /**
     * @param float $weight
     * @return Carrier
     */
    public static function quote(float $weight): Carrier
    {
        $self = new self;
        $self::$weight = $weight;

        return $self;
    }

    /**
     * @param array $country
     * @return $this
     */
    public final function from(array $country): Carrier
    {
        self::$from = $country;

        return $this;
    }

    /**
     * @param array $country
     * @return $this
     */
    public final function to(array $country): Carrier
    {
        self::$to = $country;

        return $this;
    }

    /**
     * @return Carrier[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public final function all(): array
    {
        $instance = new Instance;

        /** @var  $carriers Carrier[] * */
        $carriers = [];

        foreach ($instance->response(
            $instance->call('services',
                array(
                    'from' => self::$from,
                    'to' => self::$to,
                    'packages' => self::$parcels ?? [
                            [
                                'weight' => self::$weight, // kg
                                'height' => 20, // cm
                                'length' => 20, // cm
                                'width' => 20, // cm
                            ]
                        ],
                    'sortBy' => self::$sortBy ?? 'totalPrice',
                )
            )
        ) as $carrier) {
            $carriers[] = new Carrier(
                array_merge($carrier, ['logo' => self::CDN_URL . "carrier-logos/{$carrier['logo_id']}.svg"])
            );
        }

        return $carriers;
    }

    /**
     * @param $id
     * @return Carrier|void
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public final function find($id)
    {

        foreach (self::all() as $carrier) {
            if ((string)$carrier->id === (string)$id) {
                return $carrier;
            }
        }
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

    /**
     * @var
     */
    protected static
        $to,
        $from,
        $sortBy,
        $weight,
        $parcels;

    /**
     * @var
     */
    public
        $id,
        $name,
        $carrier_name,
        $currency,
        $first_estimated_delivery_date,
        $url_terms_and_conditions,
        $base_price,
        $transit_hours;

}
