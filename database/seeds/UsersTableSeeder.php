<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user   = Role::where('name', 'User')->first();
        $role_author = Role::where('name', 'Author')->first();
        $role_admin  = Role::where('name', 'Admin')->first();
        
        $user           = new User();
        $user->name     = 'Simple user';
        $user->email    = 'simpleuser@gmail.com';
        $user->password = bcrypt('user123');
        $user->mobile   = '+8801853730155';
        $user->address  = 'dhaka, bangladesh';
        $user->picture  = 'name.jpg';
        $user->status   = '1';
        $user->save();
        $user->roles()->attach($role_user);
        
        $author           = new User();
        $author->name     = 'Simple author';
        $author->email    = 'simpleauthor@gmail.com';
        $author->password = bcrypt('author123');
        $author->mobile   = '+8801853730155';
        $author->address  = 'dhaka, bangladesh';
        $author->picture  = 'name.jpg';
        $author->status   = '1';
        $author->save();
        $author->roles()->attach($role_author);
        
        $admin           = new User();
        $admin->name     = 'Simple admin';
        $admin->email    = 'simpleadmin@gmail.com';
        $admin->password = bcrypt('admin123');
        $admin->mobile   = '+8801853730155';
        $admin->address  = 'dhaka, bangladesh';
        $admin->picture  = 'name.jpg';
        $admin->status   = '1';
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
