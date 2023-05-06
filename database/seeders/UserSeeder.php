<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'email' => "admin@domain.com",
                'role_id' => Role::ROLE_ADMIN_ID,
                'password' => bcrypt("password"),
                'first_name' => "admin",
                'last_name' => "admin"
            ],
            [
                'email' => "manager@manager.com",
                'role_id' => Role::ROLE_MANAGER_ID,
                'password' => bcrypt("password"),
                'first_name' => "manager",
                'last_name' => "manager"
            ],
            [
                'email' => "user@gmail.com",
                'role_id' => Role::ROLE_USER_ID,
                'password' => bcrypt("password"),
                'first_name' => "user",
                'last_name' => "user"
            ]
        ];

        User::insert($users);
    }
}
