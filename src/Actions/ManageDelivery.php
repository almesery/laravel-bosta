<?php

namespace Almesery\Bosta\Actions;

trait ManageDelivery
{
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
     * @param $deliveryId
     * @return mixed
     */
    public function findDeliveryById($deliveryId)
    {
        return $this->get("deliveries/$deliveryId");
    }
}
