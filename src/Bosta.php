<?php

namespace Almesery\Bosta;

use Almesery\Bosta\Actions\ManageCity;
use Almesery\Bosta\Actions\ManageDelivery;
use Almesery\Bosta\Actions\ManagePickUpLocations;
use GuzzleHttp\Client;

class Bosta
{
    use MakesHttpRequests,
        ManagePickUpLocations,
        ManageCity,
        ManageDelivery;

    /**
     * @var string
     */
    protected string $apiKey;

    protected $baseUri;

    /**
     * @var Client
     */
    protected Client $guzzle;

    /**
     * @var string
     */
    protected string $email;

    /**
     * @var string
     */
    protected string $password;


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

        $this->baseUri = config('bosta.production.base_url');
    }

    public function setApiKey(string $apiKey, Client $guzzle = null)
    {
        $this->apiKey = $apiKey;
        $this->guzzle = $guzzle ?: new Client([
            'base_uri' => $this->baseUri,
            "http_errors" => 'false',
            'headers' => [
                'authorization' => $this->apiKey,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);
    }

}
