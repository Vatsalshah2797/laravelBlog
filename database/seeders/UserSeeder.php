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
        //admin role user creation
        $adminuser = User::create([
            'name' => 'Vatsal Shah',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')
        ]);
    
        $adminrole = Role::create(['name' => 'Admin']);
     
        $adminpermissions = Permission::pluck('id', 'id')->all();
   
        $adminrole->syncPermissions($adminpermissions);
     
        $adminuser->assignRole([$adminrole->id]);

        //user role user creation
        $user = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('user')
        ]);
    
        $role = Role::create(['name' => 'User']);
     
        $permissions = Permission::whereIn('name', ['post-list',
            'post-create',
            'post-show',
            'post-edit'
        ])->pluck('id', 'id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}
