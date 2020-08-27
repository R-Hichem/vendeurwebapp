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

         DB::table('order_products')->insert([
            "order_id" => 1,
            "product_id" => 2,
            "quantity" => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('order_products')->insert([
            "order_id" => 2,
            "product_id" => 3,
            "quantity" => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

         DB::table('order_products')->insert([
            "order_id" => 3,
            "product_id" => 1,
            "quantity" => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('order_products')->insert([
            "order_id" => 4,
            "product_id" => 6,
            "quantity" => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('order_products')->insert([
            "order_id" => 4,
            "product_id" => 8,
            "quantity" => 14,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}