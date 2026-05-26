<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Database\Seeder;

class HomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slider::truncate();
        Category::truncate();
        Product::truncate();
        Brand::truncate();
        Banner::truncate();

        Slider::create([
            'title' => 'M75 Sport Watch',
            'subtitle' => 'No restocking fee ($35 savings)',
            'description' => 'Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.',
            'price_label' => 'Now Only',
            'price' => '$320.99',
            'cta_text' => 'Shop Now',
            'cta_url' => '#',
            'image' => 'assets/images/hero/slider-bg1.jpg',
        ]);

        Slider::create([
            'title' => 'Get the Best Deal on CCTV Camera',
            'subtitle' => 'Big Sale Offer',
            'description' => 'Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.',
            'price_label' => 'Combo Only:',
            'price' => '$590.00',
            'cta_text' => 'Shop Now',
            'cta_url' => '#',
            'image' => 'assets/images/hero/slider-bg2.jpg',
        ]);

        Category::create([
            'name' => 'TV & Audios',
            'items' => json_encode(['Smart Television', 'QLED TV', 'Audios', 'Headphones', 'View All']),
            'image' => 'assets/images/featured-categories/fetured-item-1.png',
            'link' => '#',
        ]);

        Category::create([
            'name' => 'Desktop & Laptop',
            'items' => json_encode(['Gaming Laptop', 'Office PC', 'Monitors', 'Accessories', 'View All']),
            'image' => 'assets/images/featured-categories/fetured-item-2.png',
            'link' => '#',
        ]);

        Category::create([
            'name' => 'Cctv Camera',
            'items' => json_encode(['Wireless Cameras', 'Security Cameras', 'Smart Cameras', 'Camera Drones', 'View All']),
            'image' => 'assets/images/featured-categories/fetured-item-3.png',
            'link' => '#',
        ]);

        Category::create([
            'name' => 'Dslr Camera',
            'items' => json_encode(['Digital Cameras', 'Lenses', 'Tripods', 'Camera Bags', 'View All']),
            'image' => 'assets/images/featured-categories/fetured-item-4.png',
            'link' => '#',
        ]);

        Category::create([
            'name' => 'Smart Phones',
            'items' => json_encode(['iPhone', 'Android Phones', 'Refurbished Phones', 'Accessories', 'View All']),
            'image' => 'assets/images/featured-categories/fetured-item-5.png',
            'link' => '#',
        ]);

        Category::create([
            'name' => 'Game Console',
            'items' => json_encode(['Consoles', 'Games', 'Controllers', 'Headsets', 'View All']),
            'image' => 'assets/images/featured-categories/fetured-item-6.png',
            'link' => '#',
        ]);

        Product::create([
            'name' => 'Xiaomi Mi Band 5',
            'slug' => 'xiaomi-mi-band-5',
            'category' => 'Watches',
            'price' => 199.00,
            'discount_price' => null,
            'rating' => 4.0,
            'review_count' => 420,
            'image' => 'assets/images/products/product-1.jpg',
            'badge' => null,
            'badge_class' => null,
            'is_featured' => true,
            'is_trending' => true,
            'is_new' => false,
        ]);

        Product::create([
            'name' => 'Big Power Sound Speaker',
            'slug' => 'big-power-sound-speaker',
            'category' => 'Speaker',
            'price' => 275.00,
            'discount_price' => 300.00,
            'rating' => 5.0,
            'review_count' => 78,
            'image' => 'assets/images/products/product-2.jpg',
            'badge' => '-25%',
            'badge_class' => 'sale-tag',
            'is_featured' => true,
            'is_trending' => true,
            'is_new' => false,
        ]);

        Product::create([
            'name' => 'WiFi Security Camera',
            'slug' => 'wifi-security-camera',
            'category' => 'Camera',
            'price' => 399.00,
            'discount_price' => null,
            'rating' => 5.0,
            'review_count' => 124,
            'image' => 'assets/images/products/product-3.jpg',
            'badge' => null,
            'badge_class' => null,
            'is_featured' => true,
            'is_trending' => true,
            'is_new' => false,
        ]);

        Product::create([
            'name' => 'iphone 6x plus',
            'slug' => 'iphone-6x-plus',
            'category' => 'Phones',
            'price' => 400.00,
            'discount_price' => null,
            'rating' => 5.0,
            'review_count' => 54,
            'image' => 'assets/images/products/product-4.jpg',
            'badge' => 'New',
            'badge_class' => 'new-tag',
            'is_featured' => false,
            'is_trending' => true,
            'is_new' => true,
        ]);

        Product::create([
            'name' => 'Wireless Headphones',
            'slug' => 'wireless-headphones',
            'category' => 'Headphones',
            'price' => 350.00,
            'discount_price' => null,
            'rating' => 5.0,
            'review_count' => 98,
            'image' => 'assets/images/products/product-5.jpg',
            'badge' => null,
            'badge_class' => null,
            'is_featured' => false,
            'is_trending' => true,
            'is_new' => false,
        ]);

        Product::create([
            'name' => 'Mini Bluetooth Speaker',
            'slug' => 'mini-bluetooth-speaker',
            'category' => 'Speaker',
            'price' => 70.00,
            'discount_price' => null,
            'rating' => 4.0,
            'review_count' => 66,
            'image' => 'assets/images/products/product-6.jpg',
            'badge' => null,
            'badge_class' => null,
            'is_featured' => false,
            'is_trending' => true,
            'is_new' => false,
        ]);

        Brand::create(['name' => 'Brand 01', 'logo' => 'assets/images/brands/01.png']);
        Brand::create(['name' => 'Brand 02', 'logo' => 'assets/images/brands/02.png']);
        Brand::create(['name' => 'Brand 03', 'logo' => 'assets/images/brands/03.png']);
        Brand::create(['name' => 'Brand 04', 'logo' => 'assets/images/brands/04.png']);
        Brand::create(['name' => 'Brand 05', 'logo' => 'assets/images/brands/05.png']);
        Brand::create(['name' => 'Brand 06', 'logo' => 'assets/images/brands/06.png']);

        Banner::create([
            'title' => 'New line required',
            'description' => 'iPhone 12 Pro Max',
            'price_text' => null,
            'price' => '$259.99',
            'button_text' => null,
            'button_url' => '#',
            'image' => 'assets/images/hero/slider-bnr.jpg',
            'style' => '',
        ]);

        Banner::create([
            'title' => 'Weekly Sale!',
            'description' => 'Saving up to 50% off all online store items this week.',
            'price_text' => null,
            'price' => null,
            'button_text' => 'Shop Now',
            'button_url' => '#',
            'image' => 'assets/images/hero/slider-bnr.jpg',
            'style' => 'style2',
        ]);
    }
}
