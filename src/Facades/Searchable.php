<?php

namespace MacsiDigital\Searchable\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Macsidigital\Searchable\Skeleton\SkeletonClass
 */
class Searchable extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'searchable';
    }
}
