<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@bugtracker.nl',
            'password' => bcrypt('Welkom01'),
            'is_superadmin' => 1,
            'is_developer' => 1,
        ]);
    }
}
