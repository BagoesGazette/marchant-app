<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Product\Entities\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i = 1; $i <= 10000; $i++){

            // insert data ke table product menggunakan Faker
            Product::create([
                'name'              => $faker->text(15),
                'merchant_id'       => $faker->randomElement([1, 2, 3, 4, 5]),
                'price'             => $faker->numberBetween(20000, 100000),
                'product_status'    => $faker->randomElement(['active', 'not-active'])
            ]);
  
        }

    }

}
