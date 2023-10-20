<?php

namespace Database\Seeders;

use App\Models\Comment;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($j = 1; $j < 5; $j++) {
            for ($i = 1; $i < 6; $i++) {
                Comment::create([
                    'body' => $faker->paragraph(1),
                    'user_id' => $i,
                    'post_id' => $i,
                ]);
            }
        }
    }

}
