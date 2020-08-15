<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'      => 'Dafrin Maulana',
            'username'  => 'dafrin',
            'email'     => 'dafrin@admin.com',
            'password'  => bcrypt('password')
        ]);

        $admin->assignRole('admin');
        
        $user = User::create([
            'name'      => 'Candy',
            'username'  => 'candy',
            'email'     => 'candy@user.com',
            'password'  => bcrypt('password')
        ]);
            $user->assignRole('user');
        }
}
