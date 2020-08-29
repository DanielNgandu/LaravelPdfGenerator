<?php

use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
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
            DB::table('invoices')->insert([
                'to' => $faker->unique()->userName,
                'from' => $faker->userName,
                'client_physical_address' => $faker->address,
                'client_postal_address' => $faker->postcode,
                'client_phone' => $faker->unique()->phoneNumber,
                'client_email' => $faker->unique()->email,
                'description' => $faker->text,
                'prepared_by' => $faker->name,
                'validity_period' => $faker->dateTime,

            ]);
        }
    }
}
