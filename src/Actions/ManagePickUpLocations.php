<?php

namespace Almesery\Bosta\Actions;

trait ManagePickUpLocations
{
    /**
     * @return mixed
     */
    public function listPickupLocations()
    {
        return $this->get('pickup-locations');
    }
}
