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
     * @throws \MwSpace\Packlink\Exceptions\Handler
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
                array_merge($carrier, [
                    'logo' => self::CDN_URL . "carrier-logos/{$carrier['logo_id']}.svg",
                    'collection_date' => self::getCollectionDate($carrier['available_dates']),
                    'collection_time' => self::getCollectionTime($carrier['available_dates']),
                ])
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
     * @return Carrier
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public final function first(): Carrier
    {
        return self::all()[0];
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
     * @param array $available_dates
     * @return int|string
     */
    private function getCollectionDate(array $available_dates)
    {
        return array_keys($available_dates)[0];
    }

    /**
     * @param array $available_dates
     * @return mixed
     */
    private function getCollectionTime(array $available_dates)
    {
        $date = self::getCollectionDate($available_dates);

        return str_replace(' , ', '-',
            str_replace(array('[', ']'), '',
                $available_dates[$date]
            )
        );
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
        $available_dates,
        $transit_hours;

}
