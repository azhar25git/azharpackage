<?php

namespace Azhar25git\AzharPackage;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Azhar25git\AzharPackage\Skeleton\SkeletonClass
 */
class AzharPackageFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'azhar-package';
    }
}
