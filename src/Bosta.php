<?php

namespace Almesery\Bosta;


class Bosta
{
    /**
     * @var string
     */
    protected string $apiKey;

    /**
     * @var Http
     */
    protected Http $guzzle;

    /**
     * @var string
     */
    protected string $email;

    /**
     * @var string
     */
    protected string $password;

    public function setApiKey(string $apiKey, $guzzle = null)
    {
        $this->apiKey = $apiKey;
        $this->guzzle =
    }
}
