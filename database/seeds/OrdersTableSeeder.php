<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'code' => 'ZXSZE',
            'client_name' => 'client 1',
            'ammount' =>  2000,
            'email' =>  'rekhichem@gmail.com',
            'adresse' => 'Bordj Bou Arreridj quelque part par la',
            'payed' => false,
            'shipped' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        
  

        DB::table('orders')->insert([
            'code' => 'N0TZXSZE',
            'client_name' => 'client 2',
            'ammount' =>  2000,
             'email' =>  'rekhichem@gmail.com',
            'adresse' => 'Bordj Bou Arreridj quelque part par la',
            'payed' => false,
            'shipped' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        
        DB::table('orders')->insert([
            'code' => 'P4ND0R4R3F',
            'client_name' => 'client 3',
            'ammount' =>  2000,
             'email' =>  'rekhichem@gmail.com',
            'adresse' => 'Bordj Bou Arreridj quelque part par la',
            'payed' => true,
            'shipped' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('orders')->insert([
            'code' => 'CL4P-TP',
            'client_name' => 'client 4',
            'ammount' =>  2000,
             'email' =>  'rekhichem@gmail.com',
            'adresse' => 'Bordj Bou Arreridj quelque part par la',
            'payed' => true,
            'shipped' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }
}