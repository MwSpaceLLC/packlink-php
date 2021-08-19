<?php namespace MwSpace\Packlink\Models;

use MwSpace\Packlink\Instance;

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
final class Stat extends Instance
{

    /**
     * @return Stat
//     * @throws \GuzzleHttp\Exception\GuzzleException
//     * @throws \MwSpace\Packlink\Exceptions\Handler
     */
    public static final function all(): Stat
    {
        $instance = new Instance;

        return new Stat(
            $instance->response(
                $instance->call('shipments/stats')
            )
        );
    }

    /**
     * @param array|null $data
//     * @throws \MwSpace\Packlink\Exceptions\Handler
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
    public
        $data,
        $total;

}
