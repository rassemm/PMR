<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('secret'),
            'role_id' => '1'
        ]);

        User::create([
            'name' => 'Teacher',
            'email' => 'teacher@teacher.com',
            'password' => bcrypt('secret'),
            'role_id' => '2'
        ]);
        User::create([
            'name' => 'Student',
            'email' => 'student@student.com',
            'password' => bcrypt('secret'),
            'role_id' => '3'
        ]);
    }
}
