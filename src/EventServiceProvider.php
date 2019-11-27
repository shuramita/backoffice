<?php

namespace Shura\BackOffice;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Shura\BackOffice\Listeners\UpdatePermissionForBusinessUnitOwner;
use Shura\BackOffice\Listeners\UpdatePermissionForOrganizationOwner;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Core\Organization\Events\ModuleAdded' => [
            UpdatePermissionForOrganizationOwner::class
        ],
        'Core\Organization\Events\BusinessUnitAdded' => [
            UpdatePermissionForBusinessUnitOwner::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
