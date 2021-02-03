<?php

namespace Almesery\Bosta\Cities;

use Almesery\Bosta\Bosta;
use Exception;
use stdClass;

class CityClient
{
    /**
     * Create CityClient Instance
     *
     * @param Bosta $apiClient
     */
    public function __construct(Bosta $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    /**
     * List Cities
     *
     * @return stdClass
     * @throws Exception
     */
    public function list(): stdClass
    {
        try {
            $path = 'cities';
            $response = $this->apiClient->send('GET', $path, new stdClass, '');
            if ($response->success === true) {
                return $response->data;
            } elseif ($response->success === false) {
                throw new Exception($response->message);
            }
        } catch (Exception $e) {
            return $e;
        }
    }
}
