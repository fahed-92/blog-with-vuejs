<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        Post::create([
            'title' => 'HTML Tutorial',
            'slug' => 'HTML-tutorial',
            'body' => $faker->paragraph(10),
            'image' => $faker->imageUrl(),
            'user_id' => rand(1, 5),
            'category_id' => rand(1, 5),
        ]);
        Post::create([
            'title' => 'HTML Tutorial',
            'slug' => 'html-tutorial',
            'body' => $faker->paragraph(10),
            'image' => $faker->imageUrl(),
            'user_id' => rand(1, 5),
            'category_id' => rand(1, 5),
        ]);
        Post::create([
            'title' => 'Css Tutorial',
            'slug' => 'css-tutorial',
            'body' => $faker->paragraph(10),
            'image' => $faker->imageUrl(),
            'user_id' => rand(1, 5),
            'category_id' => rand(1, 5),
        ]);
        Post::create([
            'title' => 'JS Tutorial',
            'slug' => 'js-tutorial',
            'body' => $faker->paragraph(10),
            'image' => $faker->imageUrl(),
            'user_id' => rand(1, 5),
            'category_id' => rand(1, 5),
        ]);
        Post::create([
            'title' => 'PHP Tutorial',
            'slug' => 'php-tutorial',
            'body' => $faker->paragraph(10),
            'image' => $faker->imageUrl(),
            'user_id' => rand(1, 5),
            'category_id' => rand(1, 5),
        ]);
        Post::create([
            'title' => 'Laravel Tutorial',
            'slug' => 'laravel-tutorial',
            'body' => $faker->paragraph(10),
            'image' => $faker->imageUrl(),
            'user_id' => rand(1, 5),
            'category_id' => rand(1, 5),
        ]);
    }
}
