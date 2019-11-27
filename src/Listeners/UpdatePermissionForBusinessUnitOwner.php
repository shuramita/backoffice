<?php

namespace Shura\BackOffice\Listeners;

use Shura\BackOffice\Helpers\Helper;
use Core\Organization\Listeners\Trails\UpdateDefaultGroupPermissions;

class UpdatePermissionForBusinessUnitOwner
{
    public $moduleName = 'shura/backoffice';
    use UpdateDefaultGroupPermissions;
    public function getPermissions(){
        return Helper::collect('permissions.json');
    }

    public function handle($event){
        $businessUnit = $event->businessUnit;
        if($businessUnit) {
            $this->updateBusinessUnitOwnerPermissions($businessUnit);
        }
    }
}
