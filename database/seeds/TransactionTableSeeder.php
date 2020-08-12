<?php

use Illuminate\Database\Seeder;

class TransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            'user_id' => 1,
            'order_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('transactions')->insert([
            'user_id' => 2,
            'order_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}