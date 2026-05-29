<div>
    <section class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 custom-padding-right">
                    <div class="slider-head">
                        <div class="hero-slider">
                            @foreach($sliders as $slide)
                            <div class="single-slider"
                                style="background-image: url('{{ asset('storage/banners/' . $slide->image) }}');">
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
                            <img src="{{ asset('storage/featured-categories/' . $category->image) }}" alt="{{ $category->name }}" />
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