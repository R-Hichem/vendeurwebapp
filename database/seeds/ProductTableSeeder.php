<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('products')->insert([
                'name' => "Produit ".$i,
                'unit_price' => rand(15,35)/10 * 2000,
                'quantity' => rand(15,35)/10 * 2000,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}