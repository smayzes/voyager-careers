<?php

namespace Codelabs\VoyagerCareers\Facades;

use Illuminate\Support\Facades\Facade;

class VoyagerCareers extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'voyagercareers';
    }
}
