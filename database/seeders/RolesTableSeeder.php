<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Admin',
                'owner_id' => '1',
            ],
            [
                'id'    => 2,
                'title' => 'Admin',
                'owner_id' => '1',
            ],
        ];

        Role::insert($roles);
    }
}
