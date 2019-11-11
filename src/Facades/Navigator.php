<?php


namespace Shura\BackOffice\Facades;

use App\User;
use Illuminate\Support\Facades\Facade;

/**
 * @method static registerNavigator($key, $item, $has_sub = false, $sub = [], $order = 999)
 * @method static registerSubNavigator($key, $item)
 * @method static filterByRole(User $user)
 */
class Navigator extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'BackOfficeNavigator';
    }
}
