<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permissions = [

            // admin panel permissions

            [
                'name' => 'admin_panel_access',
            ],

            // user permissions

            [
                'name' => 'users_access',
            ],

            [
                'name' => 'user_edit',
            ],

            [
                'name' => 'user_delete',
            ],

            [
                'name' => 'user_create',
            ],

            [
                'name' => 'user_show',
            ],


            // role permissions

            [
                'name' => 'roles_access',
            ],

            [
                'name' => 'role_edit',
            ],

            [
                'name' => 'role_delete',
            ],

            [
                'name' => 'role_create',
            ],

            [
                'name' => 'role_show',
            ],


            // permission permissions

            [
                'name' => 'permissions_access',
            ],

            [
                'name' => 'permission_edit',
            ],

            [
                'name' => 'permission_delete',
            ],

            [
                'name' => 'permission_create',
            ],

        // project permissions

           [
             'name' => 'project_access',
         ],

         [
             'name' => 'project_edit',
         ],

         [
             'name' => 'project_delete',
         ],

         [
             'name' => 'project_create',
         ],
         [
            'name' => 'project_validate',
        ],
        // soutenance permissions

        [
            'name' => 'soutenance_access',
        ],
        [
            'name' => 'soutenance_delete',
        ],

        [
            'name' => 'soutenance_validate',
        ],
        // Planning permissions

        [
            'name' => 'planning_access',
        ],
        [
            'name' => 'planning_delete',
        ],

        [
            'name' => 'planning_publish',
        ],
        [
            'name' => 'planning_generate',
        ],
        [
            'name' => 'planning_note',
        ],
        [
            'name' => 'planning_pv',
        ],




        ];

        foreach($permissions as $permission){
            Permission::create($permission);
        }

    }
}
