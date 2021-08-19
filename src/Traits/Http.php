<?php namespace MwSpace\Packlink\Traits;

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
trait Http
{
    /**
     * @param string $endpoint
     * @param array $data
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected final function post(string $endpoint, array $data = []): \Psr\Http\Message\ResponseInterface
    {
        return $this->client()->post(ltrim($endpoint, '/'), ['json' => $data]);
    }

    /**
     * @param string $endpoint
     * @param array $data
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected final function put(string $endpoint, array $data = []): \Psr\Http\Message\ResponseInterface
    {
        return $this->client()->put(ltrim($endpoint, '/'), ['json' => $data]);
    }

    /**
     * @param string $endpoint
     * @param array $data
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected final function remove(string $endpoint, array $data = []): \Psr\Http\Message\ResponseInterface
    {
        return $this->client()->delete(ltrim($endpoint, '/'), ['json' => $data]);
    }


    /**
     * @param string $endpoint
     * @param array $data
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected final function call(string $endpoint, array $data = []): \Psr\Http\Message\ResponseInterface
    {
        return $this->client()->get(ltrim($endpoint, '/'), ['query' => $data]);
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     * @return mixed
     */
    protected final function response(\Psr\Http\Message\ResponseInterface $response)
    {
        $body = $response->getBody();

        return json_decode(
            $body->getContents(), TRUE
        );
    }

    /**
     * @return \GuzzleHttp\Client
     */
    protected final function client(): \GuzzleHttp\Client
    {
        return new \GuzzleHttp\Client(
            [
                'base_uri' => self::BASE_URL . self::API_VERSION,
                'headers' => [
                    'Content-Type' => self::$Content_Type,
                    'Authorization' => self::$Apy_Key,
                ]
            ]
        );
    }

    /**
     * Packlink API key
     * @var string
     */
    protected static
        $Client,
        $Apy_Key,
        $Content_Type = 'application/json';
}
