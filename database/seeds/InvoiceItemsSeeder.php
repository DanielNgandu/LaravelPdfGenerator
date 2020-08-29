<?php

use Illuminate\Database\Seeder;

class InvoiceItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
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
