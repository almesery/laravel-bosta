<?php

namespace Almesery\Bosta\Actions;

trait ManageCity
{
    /**
     * @return mixed
     */
    public function getAllCities()
    {
        return $this->get('/cities');
    }


    /**
     * @param $cityId
     * @return mixed
     */
    public function getCitiyById($cityId)
    {
        return $this->get('/cities/{cityId}');
    }


    /**
     * @param $cityId
     * @return mixed
     */
    public function getZonesbyCityId($cityId)
    {
        return $this->get('/cities/{cityId}/zones');
    }

    /**
     * @param $cityId
     * @return mixed
     */
    public function getDistrictsByCityId($cityId)
    {
        return $this->get('/cities/{cityId}/districts');
    }

}
