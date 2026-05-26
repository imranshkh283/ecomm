<div>
    <header class="header navbar-area">
        <div class="topbar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4 col-12">
                        <!-- <div class="top-left">
                            <ul class="menu-top-link">
                                <li>
                                    <div class="select-position">
                                        <select id="select4">
                                            <option value="0" selected>$ USD</option>
                                            <option value="1">€ EURO</option>
                                            <option value="2">$ CAD</option>
                                            <option value="3">₹ INR</option>
                                            <option value="4">¥ CNY</option>
                                            <option value="5">৳ BDT</option>
                                        </select>
                                    </div>
                                </li>
                                <li>
                                    <div class="select-position">
                                        <select id="select5">
                                            <option value="0" selected>English</option>
                                            <option value="1">Español</option>
                                            <option value="2">Filipino</option>
                                            <option value="3">Français</option>
                                            <option value="4">العربية</option>
                                            <option value="5">हिन्दी</option>
                                            <option value="6">বাংলা</option>
                                        </select>
                                    </div>
                                </li>
                            </ul>
                        </div> -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <!-- <div class="top-middle">
                            <ul class="useful-links">
                                <li><a href="#">Home</a></li>
                                <li><a href="#about">About Us</a></li>
                                <li><a href="#contact">Contact Us</a></li>
                            </ul>
                        </div> -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-end">
                            <div class="user">
                                <i class="lni lni-user"></i>
                                Hello
                            </div>
                            <ul class="user-login">
                                <li><a href="#">Sign In</a></li>
                                <li><a href="#">Register</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-7">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="{{ asset('assets/images/logo/logo.svg') }}" alt="Logo" />
                        </a>
                    </div>
                    <div class="col-lg-5 col-md-7 d-xs-none">
                        <div class="main-menu-search">
                            <div class="navbar-search search-style-5">
                                <div class="search-select">
                                    <div class="select-position">
                                        <select id="select1">
                                            <option selected>All</option>
                                            <option value="1">option 01</option>
                                            <option value="2">option 02</option>
                                            <option value="3">option 03</option>
                                            <option value="4">option 04</option>
                                            <option value="5">option 05</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="search-input">
                                    <input wire:model.debounce.300ms="search" type="text" placeholder="Search" />
                                </div>
                                <div class="search-btn">
                                    <button><i class="lni lni-search-alt"></i></button>
                                </div>
                            </div>
                            @if($search)
                            <div class="search-results bg-white border p-3 mt-2">
                                <ul class="list-unstyled mb-0">
                                    @forelse($searchResults as $product)
                                    <li class="py-2">
                                        <a href="#" class="text-dark">
                                            {{ $product->name }} <small class="text-muted">({{ $product->category }})</small>
                                        </a>
                                    </li>
                                    @empty
                                    <li class="text-muted">No products found.</li>
                                    @endforelse
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-2 col-5">
                        <div class="middle-right-area">
                            <div class="nav-hotline">
                                <i class="lni lni-phone"></i>
                                <h3>
                                    Hotline:
                                    <span>(+100) 123 456 7890</span>
                                </h3>
                            </div>
                            <div class="navbar-cart">
                                <div class="wishlist">
                                    <a href="javascript:void(0)">
                                        <i class="lni lni-heart"></i>
                                        <span class="total-items">0</span>
                                    </a>
                                </div>
                                <div class="cart-items">
                                    <a href="{{ route('cart') }}" class="main-btn">
                                        <i class="lni lni-cart"></i>
                                        <livewire:cart.cart-count />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="nav-inner">
                        <div class="mega-category-menu">
                            <span class="cat-button"><i class="lni lni-menu"></i>All Categories</span>
                            <ul class="sub-category">
                                @foreach($categories as $category)
                                <li>
                                    <a href="{{ $category->link }}">{{ $category->name }} <i class="lni lni-chevron-right"></i></a>
                                    @if($category->items)
                                    <ul class="inner-sub-category">
                                        @foreach(json_decode($category->items, true) as $item)
                                        <li><a href="{{ $category->link }}">{{ $item }}</a></li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item"><a href="#" class="active">Home</a></li>
                                    <li class="nav-item"><a href="#" class="dd-menu">Pages</a></li>
                                    <li class="nav-item"><a href="#" class="dd-menu">Shop</a></li>
                                    <li class="nav-item"><a href="#" class="dd-menu">Blog</a></li>
                                    <li class="nav-item"><a href="#contact">Contact Us</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="nav-social">
                        <h5 class="title">Follow Us:</h5>
                        <ul>
                            <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-instagram"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-skype"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 custom-padding-right">
                    <div class="slider-head">
                        <div class="hero-slider">
                            @foreach($sliders as $slide)
                            <div class="single-slider" style="background-image: url({{ asset($slide->image) }});">
                                <div class="content">
                                    <h2>
                                        <span>{{ $slide->subtitle }}</span>
                                        {!! $slide->title !!}
                                    </h2>
                                    <p>{{ $slide->description }}</p>
                                    <h3><span>{{ $slide->price_label }}</span> {{ $slide->price }}</h3>
                                    <div class="button">
                                        <a href="{{ $slide->cta_url }}" class="btn">{{ $slide->cta_text }}</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="row">
                        @foreach($banners as $banner)
                        <div class="col-lg-12 col-md-6 col-12 {{ $loop->first ? 'md-custom-padding' : '' }}">
                            <div class="hero-small-banner {{ $banner->style ?? '' }}" style="background-image: url({{ asset($banner->image) }});">
                                <div class="content">
                                    <h2>{{ $banner->title }}</h2>
                                    <p>{{ $banner->description }}</p>
                                    @if($banner->price_text)
                                    <h3>{{ $banner->price_text }} <span>{{ $banner->price }}</span></h3>
                                    @endif
                                    @if($banner->button_text)
                                    <div class="button">
                                        <a class="btn" href="{{ $banner->button_url }}">{{ $banner->button_text }}</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="featured-categories section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Featured Categories</h2>
                        <p>Explore the most popular collection categories curated for your store.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($categories as $category)
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-category">
                        <h3 class="heading">{{ $category->name }}</h3>
                        <ul>
                            @foreach(json_decode($category->items, true) as $item)
                            <li><a href="{{ $category->link }}">{{ $item }}</a></li>
                            @endforeach
                        </ul>
                        <div class="images">
                            <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" />
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="trending-product section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Trending Product</h2>
                        <p>Discover top trending products based on user interest and ratings.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($trendingProducts as $product)
                <div class="col-lg-3 col-md-6 col-12">
                    <x-product-card :product="$product" />
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="brands section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-12">
                    <div class="section-title">
                        <h2 class="title">Popular Brands</h2>
                    </div>
                </div>
                <div class="col-lg-8 col-12">
                    <div class="brands-logo-wrapper">
                        <div class="brands-logo-carousel d-flex align-items-center justify-content-between">
                            @foreach($brands as $brand)
                            <div class="brand-logo">
                                <img src="{{ asset($brand->logo) }}" alt="{{ $brand->name }}" />
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="newsletter section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12">
                    <div class="newsletter-inner">
                        <div class="newsletter-content">
                            <h2>Subscribe to our Newsletter</h2>
                            <p>Get latest information, sales and offers directly in your inbox.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="newsletter-form-head">
                        <form wire:submit.prevent="subscribe" class="newsletter-form d-flex flex-wrap justify-content-between">
                            <input wire:model="newsletterEmail" type="email" placeholder="Enter your email" required />
                            <button type="submit" class="btn">Subscribe</button>
                        </form>
                        @if(session()->has('newsletterMessage'))
                        <div class="alert alert-success mt-3">{{ session('newsletterMessage') }}</div>
                        @endif
                        @error('newsletterEmail') <div class="text-danger mt-2">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-top section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="footer-widget about">
                            <a href="{{ route('home') }}" class="footer-logo"><img src="{{ asset('assets/images/logo/logo.svg') }}" alt="Logo" /></a>
                            <p>ShopGrids Laravel Demo homepage built with reusable Blade and Livewire architecture.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="footer-widget link">
                            <h4 class="title">Company</h4>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">FAQs</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="footer-widget link">
                            <h4 class="title">Support</h4>
                            <ul>
                                <li><a href="#">Help Center</a></li>
                                <li><a href="#">Terms of Service</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="footer-widget contact">
                            <h4 class="title">Contact</h4>
                            <ul>
                                <li><span>Address:</span> 123 Main Street, City</li>
                                <li><span>Phone:</span> (+100) 123 456 7890</li>
                                <li><span>Email:</span> support@example.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-12">
                        <p class="copyright">&copy; {{ date('Y') }} ShopGrids. All Rights Reserved.</p>
                    </div>
                    <div class="col-lg-6 col-12 text-lg-end">
                        <ul class="footer-social">
                            <li><a href="#"><i class="lni lni-facebook-filled"></i></a></li>
                            <li><a href="#"><i class="lni lni-twitter-original"></i></a></li>
                            <li><a href="#"><i class="lni lni-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>