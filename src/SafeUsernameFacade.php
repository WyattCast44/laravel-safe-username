<?php

namespace Wyattcast44\SafeUsername;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Wyattcast44\SafeUsername\SafeUsername
 */
class SafeUsernameFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'safe-username';
    }
}
