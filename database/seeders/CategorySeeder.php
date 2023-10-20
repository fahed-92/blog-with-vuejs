<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Category::create([
            'name' => 'HTML Tutorial',
            'slug' => Str::slug('HTML-Tutorial'),
        ]);
        \App\Models\Category::create([
            'name' => 'CSS Tutorial',
            'slug' => Str::slug('CSS-Tutorial'),
        ]);
        \App\Models\Category::create([
            'name' => 'JS Tutorial',
            'slug' => Str::slug('JS-Tutorial'),
        ]);
        \App\Models\Category::create([
            'name' => 'PHP Tutorial',
            'slug' => Str::slug('PHP-Tutorial'),
        ]);
        \App\Models\Category::create([
            'name' => 'Laravel Tutorial',
            'slug' => Str::slug('Laravel-Tutorial'),
        ]);
    }
}
