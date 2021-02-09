<?php

namespace Almesery\Bosta\Actions;

trait ManageCity
{
    /**
     * @return mixed
     */
    public function getAllCities()
    {
        return $this->get('cities');
    }


    /**
     * @param $cityId
     * @return mixed
     */
    public function getCityById(string $cityId)
    {
        return $this->get("cities/$cityId");
    }


    /**
     * @param $cityId
     * @return mixed
     */
    public function getZonesbyCityId(string $cityId)
    {
        return $this->get("cities/$cityId/zones");
    }

    /**
     * @param $cityId
     * @return mixed
     */
    public function getDistrictsByCityId(string $cityId)
    {
        return $this->get("cities/$cityId/districts");
    }

}
