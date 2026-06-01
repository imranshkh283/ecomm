<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use App\Models\Product;
use App\Models\Category;
use App\Services\CartService;
use App\Livewire\Traits\HasStoreData;
use Illuminate\Support\Str;

class ProductsPage extends Component
{
    use HasStoreData, WithPagination;

    public string $search = '';
    public string $sortBy = 'popularity';
    public array $selectedCategories = [];
    public float $minPrice = 0;
    public float $maxPrice = 10000;
    public string $viewMode = 'list'; // 'grid' or 'list'

    public function mount(): void
    {
        $this->loadStoreData();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedSortBy()
    {
        $this->resetPage();
    }

    public function updatedSelectedCategories()
    {
        $this->resetPage();
    }

    public function updatedMinPrice()
    {
        $this->resetPage();
    }

    public function updatedMaxPrice()
    {
        $this->resetPage();
    }

    public function addToCart($productId, CartService $cartService)
    {
        $product = Product::findOrFail($productId);

        $cartService->add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'image' => $product->image,
        ]);

        $this->dispatch('cart-updated');
        session()->flash('success', 'Product added to cart successfully');
    }

    #[Computed()]
    public function products()
    {
        $query = Product::query();

        // Search
        if ($this->search) {
            $query->where('name', 'like', "%{$this->search}%")
                ->orWhere('category', 'like', "%{$this->search}%");
        }

        // Category filter - since category is stored as string in products table
        if (!empty($this->selectedCategories)) {
            $query->whereIn('category', $this->selectedCategories);
        }

        // Price range filter
        $query->whereBetween('price', [$this->minPrice, $this->maxPrice]);

        // Sorting
        switch ($this->sortBy) {
            case 'price-low-high':
                $query->orderBy('price', 'asc');
                break;
            case 'price-high-low':
                $query->orderBy('price', 'desc');
                break;
            case 'rating':
                $query->orderBy('rating', 'desc');
                break;
            case 'newest':
                $query->orderByDesc('created_at');
                break;
            case 'a-z':
                $query->orderBy('name', 'asc');
                break;
            case 'z-a':
                $query->orderBy('name', 'desc');
                break;
            default: // popularity
                $query->orderByDesc('is_trending')
                    ->orderByDesc('is_featured');
        }

        return $query->paginate(12);
    }

    #[Computed()]
    public function categories()
    {
        // Get unique categories from products table
        $categories = Product::select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category')
            ->map(function ($category) {
                $count = Product::where('category', $category)->count();
                return (object) [
                    'name' => $category,
                    'slug' => Str::slug($category),
                    'products_count' => $count,
                ];
            });

        return $categories;
    }

    public function render()
    {
        return view('livewire.products-page');
    }
}
