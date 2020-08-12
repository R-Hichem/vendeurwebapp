<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('users')->delete();

        DB::table('users')->insert([
            'name' => 'Hichem Rekouane',
            'email' => 'rekhichem@gmail.com',
            'password' => bcrypt('tigzirt45T'),
        ]);

        DB::table('users')->insert([
            'name' => 'Not Hichem',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('tigzirt45T'),
        ]);
    }
}