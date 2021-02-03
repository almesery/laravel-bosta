<?php


namespace Almesery\Bosta\PickupLocations;


use Almesery\Bosta\Bosta;
use Exception;
use stdClass;

class PickupLocationClient
{
    /**
     * Create PickupLocationClient Instance
     * @param Bosta $apiClient
     */
    public function __construct(Bosta $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    /**
     * List PickupLocations
     *
     * @return Exception|stdClass
     */
    public function list()
    {
        try {
            $path = 'pickup-locations';
            $response = $this->apiClient->send('GET', $path, new stdClass, '');

            if ($response->success === true) {
                return $response->data;
            } elseif ($response->success === false) {
                throw new \Exception($response->message);
            }
        } catch (Exception $e) {
            return $e;
        }
    }
}
