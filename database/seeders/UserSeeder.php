<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        \App\Models\User::create([
            'name' => $faker->name(),
            'email' => $faker->email(),
            'email_verified_at' => $faker->dateTime(),
            'password' => $faker->password(),
            'profile_img' => $faker->imageUrl(),
        ]);

        \App\Models\User::create([
            'name' => $faker->name(),
            'email' => $faker->email(),
            'email_verified_at' => $faker->dateTime(),
            'password' => $faker->password(),
            'profile_img' => $faker->imageUrl(),
        ]);

        \App\Models\User::create([
            'name' => $faker->name(),
            'email' => $faker->email(),
            'email_verified_at' => $faker->dateTime(),
            'password' => $faker->password(),
            'profile_img' => $faker->imageUrl(),
        ]);

        \App\Models\User::create([
            'name' => $faker->name(),
            'email' => $faker->email(),
            'email_verified_at' => $faker->dateTime(),
            'password' => $faker->password(),
            'profile_img' => $faker->imageUrl(),
        ]);

        \App\Models\User::create([
            'name' => $faker->name(),
            'email' => $faker->email(),
            'email_verified_at' => $faker->dateTime(),
            'password' => $faker->password(),
            'profile_img' => $faker->imageUrl(),
        ]);
    }
}
