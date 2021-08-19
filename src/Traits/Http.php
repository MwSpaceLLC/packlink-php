<?php namespace MwSpace\Packlink\Traits;

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
                    'X-Module-Version' => self::$Module_Version,
                    'X-Ecommerce-Name' => self::$Ecommerce_Name,
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
        $Content_Type = 'application/json',
        $Module_Version = '1.0.0',
        $Ecommerce_Name = 'mwspace@packlink-php';
}
