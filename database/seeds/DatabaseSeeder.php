<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
//use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // use the factory to create a Faker\Generator instance
        $faker = Faker\Factory::create();
        // $this->call(UserSeeder::class);
        for($i = 0; $i < 100; $i++) {

            DB::table('invoice_items')->insert([
                'invoice_id' => 1,
                'item_description' => $faker->text,
                'item_quantity' => $faker->numberBetween(0,200),
                'item_cost' => $faker->biasedNumberBetween(0,100,"sqrt")
            ]);
        }
    }
}
