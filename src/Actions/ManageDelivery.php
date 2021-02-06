<?php

namespace Almesery\Bosta\Actions;

trait ManageDelivery
{
    /**
     * @param $deliveryId
     * @return mixed
     */
    public function createAirwayBill($deliveryId)
    {
        return $this->get("deliveries/awb/$deliveryId");
    }

    /**
     * @param $deliveryId
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
