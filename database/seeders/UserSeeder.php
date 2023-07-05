<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User Create
        // $adminUser = User::insert([
        //     [
        //         'name' => 'Admin',
        //         'email' => 'admin@admin.com',
        //         'password' => bcrypt('admin')
        //     ],
        //     [
        //         'name' => 'User',
        //         'email' => 'user@gmail.com',
        //         'password' => bcrypt('user')
        //     ],
        //     [
        //         'name' => 'Vatsal Shah',
        //         'email' => 'vatsalshah2797@gmail.com',
        //         'password' => bcrypt('vatsal')
        //     ]
        // ]);

        $adminUser = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')
        ]);


        $user =  User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('user')
        ]);

        //Role create
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        //Give Permission
        $adminPermissions = [
            'user-list',
            'user-create',
            //'user-edit',
            'user-delete',
            // 'role-list',
            // 'role-create',
            // 'role-edit',
            // 'role-delete',
            'post-list',
            'post-create',
            'post-edit',
            'post-delete'
         ];
      
        foreach ($adminPermissions as $permission) {
              Permission::create(['name' => $permission]);
              $adminRole->givePermissionTo($permission);
        }

        $userPermissions = [
            // 'role-list',
            // 'role-create',
            // 'role-edit',
            // 'role-delete',
            'post-list',
            'post-create',
            'post-edit'
         ];
      
        foreach ($userPermissions as $permission) {
              Permission::create(['name' => $permission]);
              $userRole->givePermissionTo($permission);
        }

        // $permission = Permission::create(['name' => 'create users']);
        // $adminRole->givePermissionTo($permission);

        $adminUser->assignRole($adminRole);
        $user->assignRole($userRole);
    }
}
