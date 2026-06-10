<?php

namespace App\Livewire;

use App\Models\Product;
use App\Services\CartService;
use App\Livewire\Traits\HasStoreData;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;
use App\Livewire\Traits\HasCartActions;

class ProductsPage extends Component
{
    use HasStoreData, WithPagination;
    use HasCartActions {
        addToCart as protected traitAddToCart;
    }

    protected string $paginationTheme = 'bootstrap';

    protected array $queryString = [
        'search' => ['except' => ''],
        'sortBy' => ['except' => 'popularity'],
        'selectedCategories' => ['except' => []],
        'minPrice' => ['except' => 0],
        'maxPrice' => ['except' => 10000],
        'viewMode' => ['except' => 'list'],
    ];

    public string $search = '';
    public string $sortBy = 'popularity';
    public array $selectedCategories = [];
    public float $minPrice = 0;
    public float $maxPrice = 10000;
    public string $viewMode = 'list';

    public function mount(): void
    {
        $this->loadStoreData();
    }

    public function updating($name, $value): void
    {
        if (in_array($name, ['search', 'sortBy', 'selectedCategories', 'minPrice', 'maxPrice'], true)) {
            $this->resetPage();
        }
    }

    public function setViewMode(string $mode): void
    {
        if (in_array($mode, ['grid', 'list'], true)) {
            $this->viewMode = $mode;
        }
    }

    public function clearFilters(): void
    {
        $this->search = '';
        $this->sortBy = 'popularity';
        $this->selectedCategories = [];
        $this->minPrice = 0;
        $this->maxPrice = 10000;
        $this->resetPage();
    }

    public function getProductsProperty()
    {
        return $this->buildProductsQuery()
            ->paginate(12);
    }

    protected function buildProductsQuery(): Builder
    {
        return Product::query()
            ->when($this->search, function (Builder $query) {
                $query->where(function (Builder $query) {
                    $query->where('name', 'like', "%{$this->search}%")
                        ->orWhere('category', 'like', "%{$this->search}%");
                });
            })
            ->when($this->selectedCategories, fn(Builder $query) => $query->whereIn('category', $this->selectedCategories))
            ->whereBetween('price', [$this->minPrice, $this->maxPrice])
            ->when($this->sortBy, function (Builder $query) {
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
                    default:
                        $query->orderByDesc('is_trending')
                            ->orderByDesc('is_featured');
                }
            });
    }

    public function getCategoriesProperty()
    {
        return Product::query()
            ->selectRaw('category, COUNT(*) AS products_count')
            ->groupBy('category')
            ->orderBy('category')
            ->get()
            ->map(function ($row) {
                return (object) [
                    'name' => $row->category,
                    'slug' => Str::slug($row->category),
                    'products_count' => $row->products_count,
                ];
            });
    }

    public function getProductIdsProperty(): array
    {
        return collect($this->products->items())
            ->pluck('id')
            ->toArray();
    }

    public function render(): View
    {
        return view('livewire.products-page', [
            'products' => $this->products,
            'categories' => $this->categories,
            'productIds' => $this->productIds,
        ]);
    }
}
