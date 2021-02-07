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
        return $this->get("deliveries/$deliveryId");
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
}
