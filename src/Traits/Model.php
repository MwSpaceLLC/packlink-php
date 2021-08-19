<?php namespace MwSpace\Packlink\Traits;

use MwSpace\Packlink\Exceptions\Handler;

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
trait Model
{
    /**
     * @param array $data
     * @return static
     * @throws Handler
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function create(array $data): self
    {
        $self = (new self($data));

        $save = $self->save();

        if (!isset($save['id']) && !isset($save['reference'])) {
            throw new Handler(basename(get_class($self)) . " | " .
                (!isset($save['messages']) ?: json_encode($save['messages'])) .
                " | Possible limit to create"
            );
        }

        return $self::find($save['id'] ?? $save['reference']);
    }

    /**
     * @return array
     */
    public final function toArray(): array
    {
        return get_object_vars($this);
    }
}
