<?php

namespace Shura\BackOffice\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Junges\ACL\Exceptions\PermissionAlreadyExistsException;
use Junges\ACL\Http\Models\Permission;
use Shura\BackOffice\Helpers\Helper;


class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Helper::collect('permissions.json');
        $permissions->map(function ($perm) {
            try {
                Artisan::call('permission:create', ["name" => $perm->name, "slug" => $perm->slug, "description" => $perm->description]);
            } catch (PermissionAlreadyExistsException $e) {
                Log::info($e);
                dump($e->getMessage());
            };
        });
    }
}
