<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class PermissionandRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role =  Role::create(['name' => 'admin']);
        $user = User::find(1);
        $user->assignRole('admin');

        $role2 =  Role::create(['name' => 'blog']);
        $user2 = User::find(2);
        $user2->assignRole('blog');

        $role3 =  Role::create(['name' => 'product']);
        $user3 = User::find(3);
        $user3->assignRole('product');

        $role4 =  Role::create(['name' => 'support']);
        $user4 = User::find(4);
        $user4->assignRole('support');
    }
}
