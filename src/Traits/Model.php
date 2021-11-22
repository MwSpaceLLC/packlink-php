<?php namespace MwSpace\Packlink\Traits;

use MwSpace\Packlink\Exceptions\Handler;

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
