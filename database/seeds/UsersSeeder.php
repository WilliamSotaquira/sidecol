<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sidecol\User::class, 20)->create();

        Role::create([
        	'name'		=>'Admin',
        	'slug'		=>'admin',
        	'special'	=>'all-access',

        ]);
    }
}
