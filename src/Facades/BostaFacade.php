<?php

namespace Almesery\Bosta\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Almesery\Bosta\Bosta
 */
class BostaFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Bosta';
    }
}
