<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('Awn_admn_is_me')
        ]);
    }
}
