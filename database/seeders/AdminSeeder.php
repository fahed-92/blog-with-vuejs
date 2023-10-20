<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        \App\Models\User::create([
            'name' => $faker->name(),
            'email' => $faker->email(),
            'email_verified_at' => $faker->dateTime(),
            'password' => $faker->password(),
            'profile_img' => $faker->imageUrl(),
            'is_admin' => true
        ]);
    }
}
