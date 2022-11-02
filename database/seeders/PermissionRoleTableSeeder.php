<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));
        $user_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_' && substr($permission->title, 0, 5) != 'team_';
        });

        $Manager_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 12) != 'landingpage_' &&
                    substr($permission->title, 0, 9) != 'homepage_' &&
                    substr($permission->title, 0, 6) != 'about_' &&
                    substr($permission->title, 0, 4) != 'faq_' &&
                    substr($permission->title, 0, 8) != 'service_' &&
                    substr($permission->title, 0, 6) != 'price_' &&
                    substr($permission->title, 0, 11) != 'permission_' &&
                    substr($permission->title, 0, 5) != 'team_' &&
                    substr($permission->title, 0, 11) != 'user_alert_' &&
                    substr($permission->title, 0, 6) != 'audit_';
        });
        Role::findOrFail(2)->permissions()->sync($Manager_permissions);
    }
}
