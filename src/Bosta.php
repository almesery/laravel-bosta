<?php

namespace Almesery\Bosta;

use Almesery\Bosta\Actions\ManageCity;
use Almesery\Bosta\Actions\ManageDelivery;
use Almesery\Bosta\Actions\ManagePickUpLocations;
use Exception;
use GuzzleHttp\Client;

class Bosta
{
    use MakesHttpRequests;
    use ManagePickUpLocations;
    use ManageCity;
    use ManageDelivery;

    /**
     * @var string
     */
    protected string $apiKey;

    /**
     * @var string
     */
    protected string $bosaUrl;

    /**
     * @var Client
     */
    protected Client $guzzle;

    /**
     * Bosta constructor.
     * @param Client|null $guzzle
     * @throws Exception
     */
    public function __construct(Client $guzzle = null)
    {
        $mode = config('bosta.mode');

        if (! in_array($mode, ['test', 'production'])) {
            throw new Exception('Mode Option must be test or production');
        }

        if ($mode == "test") {
            $baseUrl = config('bosta.stage.base_url');
            $apiKey = config('bosta.stage.bosta_api_key');
        } else {
            $apiKey = config('bosta.production.bosta_api_key');
            $baseUrl = config('bosta.production.base_url');
        }

        if (! is_null($apiKey)) {
            $this->setApiKey($apiKey, $baseUrl, $guzzle);
        }

        if (! is_null($guzzle)) {
            $this->guzzle = $guzzle;
        }
    }

    /**
     * @param string $apiKey
     * @param string $baseUrl
     * @param Client|null $guzzle
     */
    public function setApiKey(string $apiKey, string $baseUrl, Client $guzzle = null)
    {
        $this->apiKey = $apiKey;

        $this->guzzle = $guzzle ?: new Client([
            'base_uri' => $baseUrl,
            "http_errors" => 'false',
            'headers' => [
                'authorization' => $this->apiKey,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);
    }
}
