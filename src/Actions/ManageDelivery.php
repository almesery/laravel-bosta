<?php

namespace Almesery\Bosta\Actions;

use Almesery\Bosta\Exceptions\CannotPrintAirWayAsDeliveryTerminatedException;
use GuzzleHttp\Exception\RequestException;

trait ManageDelivery
{

    /**
     * @param $deliveryId
     * @return mixed
     */
    public function createAirwayBill($deliveryId)
    {
        try {
            return $this->get("deliveries/awb/$deliveryId");
        } catch (RequestException $exception) {
            return response()->json(['status' => 'error', 'message' => (string)$exception->getMessage()], 404)->getData();
        }
    }

    /**
     * @return mixed
     */
    public function exportCsv()
    {
        return $this->post("deliveries/exportcsv");
    }

    /**
     * @param $deliveryId
     * @return mixed
     */
    public function findDeliveryById($deliveryId)
    {
        try {
            return $this->get("deliveries/$deliveryId");
        } catch (RequestException $exception) {
            return response()->json(['status' => 'error', 'message' => (string)$exception->getMessage()], 404)->getData();
        }
    }

    /**
     * @param int $page
     * @param int $perPage
     * @return mixed
     */
    public function getDeliveries(int $page = 1, int $perPage = 50)
    {
        return $this->get("deliveries?page=$page&perPage=$perPage");
    }

    /**
     * @param int $page
     * @param int $perPage
     * @param string $state
     * @return mixed
     */
    public function searchDelivery(int $page = 1, int $perPage = 50, string $state = 'Delivered')
    {
        return $this->get("deliveries/search?pageNumber=$page&pageLimit=$perPage&state=$state");
    }
}
