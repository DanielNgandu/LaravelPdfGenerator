<?php

use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();
        for($i = 0; $i < 100; $i++) {

            DB::table('company_configurations')->insert([
                'user_id' => 1,
                'company_name' => $faker->company,
                'company_tpin' => $faker->phoneNumber,
                'company_physical_address' => $faker->address,
                'company_postal_address' => $faker->streetAddress,
                'company_phone' => $faker->phoneNumber,
                'company_email' => $faker->companyEmail,
                'company_website' => $faker->companyEmail,
                'image' => $faker->imageUrl(640, 480)


            ]);
        }
        }
}
