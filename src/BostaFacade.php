<?php

namespace Almesery\Bosta;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Almesery\Bosta\Bosta
 */
class BostaFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-bosta';
    }
}
