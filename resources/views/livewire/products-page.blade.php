<div>
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Shop Products</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="{{ route('products.index') }}">Shop</a></li>
                        <li>Products</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Product Grids -->
    <section class="product-grids section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12">
                    <div class="product-sidebar">
                        <div class="single-widget search">
                            <h3>Search Product</h3>
                            <input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="Search Here...">
                        </div>

                        <div class="single-widget">
                            <h3>All Categories</h3>
                            <ul class="list">
                                @forelse($categories as $category)
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            id="category-{{ $loop->index }}"
                                            wire:model="selectedCategories"
                                            value="{{ $category->name }}">
                                        <label class="form-check-label" for="category-{{ $loop->index }}">
                                            {{ $category->name }} <span>({{ $category->products_count }})</span>
                                        </label>
                                    </div>
                                </li>
                                @empty
                                <li>No categories available.</li>
                                @endforelse
                            </ul>
                        </div>

                        <div class="single-widget range">
                            <h3>Price Range</h3>
                            <div class="mb-3">
                                <label for="minPrice" class="form-label">Minimum</label>
                                <input wire:model.debounce.300ms="minPrice" id="minPrice" type="number" min="0" class="form-control" />
                            </div>
                            <div>
                                <label for="maxPrice" class="form-label">Maximum</label>
                                <input wire:model.debounce.300ms="maxPrice" id="maxPrice" type="number" min="0" class="form-control" />
                            </div>
                        </div>

                        <div class="single-widget condition">
                            <h3>Filter Options</h3>
                            <button wire:click.prevent="clearFilters" class="btn btn-outline-primary w-100">Clear filters</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-12">
                    <div class="product-grids-head">
                        @if(session()->has('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <div class="product-grid-topbar">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-8 col-12">
                                    <div class="product-sorting d-flex align-items-center gap-3">
                                        <label for="sorting">Sort by:</label>
                                        <select wire:model="sortBy" id="sorting" class="form-control">
                                            <option value="popularity">Popularity</option>
                                            <option value="price-low-high">Low - High Price</option>
                                            <option value="price-high-low">High - Low Price</option>
                                            <option value="rating">Average Rating</option>
                                            <option value="a-z">A - Z Order</option>
                                            <option value="z-a">Z - A Order</option>
                                        </select>
                                        <h3 class="total-show-product">Showing: <span>{{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }} of {{ $products->total() }} items</span></h3>
                                    </div>
                                </div>

                                <div class="col-lg-5 col-md-4 col-12">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button type="button"
                                                class="nav-link {{ $viewMode === 'grid' ? 'active' : '' }}"
                                                wire:click.prevent="setViewMode('grid')"
                                                aria-selected="{{ $viewMode === 'grid' ? 'true' : 'false' }}">
                                                <i class="lni lni-grid-alt"></i>
                                            </button>
                                            <button type="button"
                                                class="nav-link {{ $viewMode === 'list' ? 'active' : '' }}"
                                                wire:click.prevent="setViewMode('list')"
                                                aria-selected="{{ $viewMode === 'list' ? 'true' : 'false' }}">
                                                <i class="lni lni-list"></i>
                                            </button>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane {{ $viewMode === 'grid' ? 'show active' : '' }}" id="nav-grid" role="tabpanel">
                                @livewire('product.product-grid', ['productIds' => $productIds], key('product-grid'))
                            </div>

                            <div class="tab-pane {{ $viewMode === 'list' ? 'show active' : '' }}" id="nav-list" role="tabpanel">
                                @livewire('product.product-list', ['productIds' => $productIds], key('product-list'))
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Grids -->
</div>