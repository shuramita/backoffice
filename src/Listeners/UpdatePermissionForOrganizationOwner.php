<?php

namespace Shura\BackOffice\Listeners;

use Shura\BackOffice\Helpers\Helper;

class UpdatePermissionForOrganizationOwner extends \Core\Organization\Listeners\UpdatePermissionForOrganizationOwner
{
    public $moduleName = 'shura\backoffice';
    public function getPermissions(){
        return Helper::collect('permissions.json');
    }
}
