<?php

namespace App\Livewire\Traits;

use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;

trait HasStoreData
{
    public $sliders;
    public $categories;
    public $featuredProducts;
    public $trendingProducts;
    public $brands;
    public $banners;

    public function loadStoreData(): void
    {
        $this->sliders = Slider::orderBy('id')->get();

        $this->categories = Category::orderBy('id')->get();

        $this->featuredProducts = Product::where('is_featured', true)->get();

        $this->trendingProducts = Product::where('is_trending', true)->get();

        $this->brands = Brand::orderBy('id')->get();

        $this->banners = Banner::orderBy('id')->get();
    }
}
