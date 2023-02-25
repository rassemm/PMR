<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'title' => 'Administrator',
            'short_code' => 'Admin',
        ]);

        Role::create([
            'title' => 'Teacher',
            'short_code' => 'teacher',
        ]);
        Role::create([
            'title' => 'Student',
            'short_code' => 'Student',
        ]);
    }
}
