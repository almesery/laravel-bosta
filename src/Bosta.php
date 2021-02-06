<?php

namespace Almesery\Bosta;

use Almesery\Bosta\Actions\ManagePickUpLocations;
use GuzzleHttp\Client;

class Bosta
{

    use MakesHttpRequests,
        ManagePickUpLocations;

    /**
     * @var string
     */
    protected string $apiKey;

    /**
     * @var Client
     */
    protected Client $guzzle;

    /**
     * Bosta constructor.
     * @param null $apiKey
     * @param Client|null $guzzle
     */
    public function __construct($apiKey = null, Client $guzzle = null)
    {

        if (!is_null($apiKey)) {
            $this->setApiKey($apiKey, $guzzle);
        }

        if (!is_null($guzzle)) {
            $this->guzzle = $guzzle;
        }
    }

    /**
     * @param string $apiKey
     * @param Client|null $guzzle
     * @return $this
     */
    public function setApiKey(string $apiKey, Client $guzzle = null): Bosta
    {
        $this->apiKey = $apiKey;
        $this->guzzle = $guzzle ?: new Client([
            'base_uri' => config('bosta.production.base_url'),
            "http_errors" => 'false',
            'headers' => [
                "Content-Type" => "application/json",
                "Accept" => "application/json",
                'authorization' => $this->apiKey,
                'X-Requested-By' => 'php-sdk',
            ],
        ]);
        return $this;
    }
}
