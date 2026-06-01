<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        Menu::query()->delete();

        $electronics = Menu::create([
            'name' => 'Electronics',
            'slug' => 'electronics',
            'position' => 1,
        ]);

        Menu::create(['name' => 'Smartphones', 'slug' => 'smartphones', 'parent_id' => $electronics->id, 'position' => 1]);
        Menu::create(['name' => 'Laptops', 'slug' => 'laptops', 'parent_id' => $electronics->id, 'position' => 2]);
        Menu::create(['name' => 'Cameras', 'slug' => 'cameras', 'parent_id' => $electronics->id, 'position' => 3]);
        Menu::create(['name' => 'Headphones', 'slug' => 'headphones', 'parent_id' => $electronics->id, 'position' => 4]);
        Menu::create(['name' => 'Watches', 'slug' => 'watches', 'parent_id' => $electronics->id, 'position' => 5]);

        $home = Menu::create([
            'name' => 'Home & Appliances',
            'slug' => 'home-appliances',
            'position' => 2,
        ]);

        Menu::create(['name' => 'Kitchen Appliances', 'slug' => 'kitchen-appliances', 'parent_id' => $home->id, 'position' => 1]);
        Menu::create(['name' => 'Refrigerators', 'slug' => 'refrigerators', 'parent_id' => $home->id, 'position' => 2]);
        Menu::create(['name' => 'Washing Machines', 'slug' => 'washing-machines', 'parent_id' => $home->id, 'position' => 3]);
        Menu::create(['name' => 'Air Conditioners', 'slug' => 'air-conditioners', 'parent_id' => $home->id, 'position' => 4]);

        $fashion = Menu::create([
            'name' => 'Fashion',
            'slug' => 'fashion',
            'position' => 3,
        ]);

        Menu::create(['name' => 'Men Clothing', 'slug' => 'men-clothing', 'parent_id' => $fashion->id, 'position' => 1]);
        Menu::create(['name' => 'Women Clothing', 'slug' => 'women-clothing', 'parent_id' => $fashion->id, 'position' => 2]);
        Menu::create(['name' => 'Footwear', 'slug' => 'footwear', 'parent_id' => $fashion->id, 'position' => 3]);
        Menu::create(['name' => 'Accessories', 'slug' => 'accessories', 'parent_id' => $fashion->id, 'position' => 4]);

        $beauty = Menu::create([
            'name' => 'Beauty & Health',
            'slug' => 'beauty-health',
            'position' => 4,
        ]);

        Menu::create(['name' => 'Skincare', 'slug' => 'skincare', 'parent_id' => $beauty->id, 'position' => 1]);
        Menu::create(['name' => 'Makeup', 'slug' => 'makeup', 'parent_id' => $beauty->id, 'position' => 2]);
        Menu::create(['name' => 'Fragrances', 'slug' => 'fragrances', 'parent_id' => $beauty->id, 'position' => 3]);
        Menu::create(['name' => 'Personal Care', 'slug' => 'personal-care', 'parent_id' => $beauty->id, 'position' => 4]);

        $gaming = Menu::create([
            'name' => 'Gaming',
            'slug' => 'gaming',
            'position' => 5,
        ]);

        Menu::create(['name' => 'Consoles', 'slug' => 'consoles', 'parent_id' => $gaming->id, 'position' => 1]);
        Menu::create(['name' => 'Games', 'slug' => 'games', 'parent_id' => $gaming->id, 'position' => 2]);
        Menu::create(['name' => 'Controllers', 'slug' => 'controllers', 'parent_id' => $gaming->id, 'position' => 3]);
        Menu::create(['name' => 'Gaming Accessories', 'slug' => 'gaming-accessories', 'parent_id' => $gaming->id, 'position' => 4]);
    }
}
