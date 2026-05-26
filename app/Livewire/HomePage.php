<?php

namespace App\Livewire;

use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Livewire\Component;

class HomePage extends Component
{
    public string $search = '';
    public string $newsletterEmail = '';

    public $sliders;
    public $categories;
    public $featuredProducts;
    public $trendingProducts;
    public $brands;
    public $banners;

    public function mount(): void
    {
        $this->sliders = Slider::orderBy('id')->get();
        $this->categories = Category::orderBy('id')->get();
        $this->featuredProducts = Product::where('is_featured', true)->get();
        $this->trendingProducts = Product::where('is_trending', true)->get();
        $this->brands = Brand::orderBy('id')->get();
        $this->banners = Banner::orderBy('id')->get();
    }

    public function getSearchResultsProperty()
    {
        return Product::when($this->search, function ($query) {
            return $query->where('name', 'like', "%{$this->search}%")
                ->orWhere('category', 'like', "%{$this->search}%");
        })->limit(6)->get();
    }

    public function subscribe(): void
    {
        $this->validate([
            'newsletterEmail' => 'required|email',
        ]);

        session()->flash('newsletterMessage', 'Thanks for subscribing!');
        $this->newsletterEmail = '';
    }

    public function render()
    {
        return view('livewire.home-page');
    }
}
