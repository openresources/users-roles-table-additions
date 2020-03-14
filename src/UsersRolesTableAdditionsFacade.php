<?php

namespace Openresources\UsersRolesTableAdditions;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Openresources\UsersRolesTableAdditions\Skeleton\SkeletonClass
 */
class UsersRolesTableAdditionsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'users-roles-table-additions';
    }
}
