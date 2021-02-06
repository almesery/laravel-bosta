<?php

namespace Almesery\Bosta;

use Almesery\Bosta\Actions\ManagePickUpLocations;
use Exception;
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
     * @param string $loginMethod
     * @param string|null $password
     * @param string|null $email
     * @throws Exception
     */
    public function __construct($apiKey = null, Client $guzzle = null, string $loginMethod = 'account-credentials', $password = null, $email = null)
    {

        if ($loginMethod == "apiKey") {
            if (!is_null($apiKey)) {
                $this->LoginByApiKey($apiKey, $guzzle);
            }
        }

        if ($loginMethod == "accountCredentials") {
            if (!is_null($this->password) && !is_null($this->email)) {
                $this->LoginByAccountCredentials($this->email, $this->password)->post('/users/login', [
                    'email' => $this->email,
                    'password' => $this->password,
                ]);
            }
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
    public function LoginByApiKey(string $apiKey, Client $guzzle = null): Bosta
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


    /**
     * @param string $email
     * @param string $password
     * @param Client|null $guzzle
     * @return $this
     */
    public function LoginByAccountCredentials(string $email, string $password, Client $guzzle = null): Bosta
    {
        $this->email = $email;
        $this->password = $password;
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
