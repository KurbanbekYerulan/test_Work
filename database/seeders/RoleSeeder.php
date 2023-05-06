<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name'=>'ADMIN',
                'id'=>Role::ROLE_ADMIN_ID
            ],
            [
                'name'=>'USER',
                'id'=>Role::ROLE_USER_ID
            ],
            [
                'name'=>'MANAGER',
                'id'=>Role::ROLE_MANAGER_ID
            ],
        ];
        Role::insert($roles);
    }
}
