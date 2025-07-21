<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Tas Gunung',
                'slug' => 'tas-gunung',
                'description' => 'Tas carrier dan daypack untuk kebutuhan hiking dan camping',
                'icon' => 'heroicon-o-briefcase',
                'is_active' => true,
            ],
            [
                'name' => 'Tenda',
                'slug' => 'tenda',
                'description' => 'Tenda untuk camping dan bivak di gunung',
                'icon' => 'heroicon-o-home',
                'is_active' => true,
            ],
            [
                'name' => 'Sleeping Gear',
                'slug' => 'sleeping-gear',
                'description' => 'Sleeping bag, matras, dan perlengkapan tidur',
                'icon' => 'heroicon-o-moon',
                'is_active' => true,
            ],
            [
                'name' => 'Pakaian',
                'slug' => 'pakaian',
                'description' => 'Jaket, rain coat, dan pakaian outdoor',
                'icon' => 'heroicon-o-user',
                'is_active' => true,
            ],
            [
                'name' => 'Sepatu & Sandal',
                'slug' => 'sepatu-sandal',
                'description' => 'Sepatu hiking, trail running, dan sandal gunung',
                'icon' => 'heroicon-o-cube',
                'is_active' => true,
            ],
            [
                'name' => 'Cooking Gear',
                'slug' => 'cooking-gear',
                'description' => 'Kompor, nesting, dan peralatan masak',
                'icon' => 'heroicon-o-fire',
                'is_active' => true,
            ],
            [
                'name' => 'Navigasi & Penerangan',
                'slug' => 'navigasi-penerangan',
                'description' => 'GPS, kompas, headlamp, dan senter',
                'icon' => 'heroicon-o-light-bulb',
                'is_active' => true,
            ],
            [
                'name' => 'Climbing Gear',
                'slug' => 'climbing-gear',
                'description' => 'Tali, harness, helmet, dan perlengkapan panjat',
                'icon' => 'heroicon-o-shield-check',
                'is_active' => true,
            ],
            [
                'name' => 'Aksesori',
                'slug' => 'aksesori',
                'description' => 'Trekking pole, carabiner, dan aksesori pendukung',
                'icon' => 'heroicon-o-wrench-screwdriver',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
