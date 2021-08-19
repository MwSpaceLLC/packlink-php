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
        self::$instance = new Instance;

        foreach (self::$instance->response(
            self::$instance->call('services',
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
            self::$collect[] = new Carrier(
                array_merge($carrier, ['logo' => self::CDN_URL . "carrier-logos/{$carrier['logo_id']}.svg"])
            );
        }

        return self::$collect;
    }

    /**
     * @param $id
     * @return Carrier|void
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \MwSpace\Packlink\Exceptions\Handler
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
     * @throws \MwSpace\Packlink\Exceptions\Handler
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

    /** @var  $collect Carrier[] * */
    private static $collect = [];

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
