<div>
    <header class="header navbar-area">
        <div class="topbar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4 col-12"></div>
                    <div class="col-lg-4 col-md-4 col-12"></div>
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
                                    <li class="nav-item"><a href="{{ route('home') }}" class="active">Home</a></li>
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

    <section class="shopping-cart section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2>Your Shopping Cart</h2>
                        <p>Review your selected items and update quantities before checkout.</p>
                    </div>
                </div>
            </div>

            @if(session()->has('success'))
            <div class="row mb-4">
                <div class="col-12">
                    <div class="alert alert-success">{{ session('success') }}</div>
                </div>
            </div>
            @endif

            <div class="cart-list-head">
                <div class="cart-list-title">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-12"></div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <p>Product Name</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Quantity</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Price</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Total</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>Remove</p>
                        </div>
                    </div>
                </div>

                @forelse($cartItems as $item)
                <div class="cart-single-list">
                    <div class="row align-items-center">
                        <div class="col-lg-1 col-md-1 col-12">
                            <a href="#"><img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}"></a>
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <h5 class="product-name"><a href="#">{{ $item['name'] }}</a></h5>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <div class="count-input d-flex align-items-center">
                                <button wire:click="decrease({{ $item['id'] }})" class="btn btn-sm btn-danger">-</button>
                                <span class="mx-2">{{ $item['qty'] }}</span>
                                <button wire:click="increase({{ $item['id'] }})" class="btn btn-sm btn-success">+</button>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>${{ number_format($item['price'], 2) }}</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>${{ number_format($item['price'] * $item['qty'], 2) }}</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <button wire:click="remove({{ $item['id'] }})" class="remove-item btn btn-link p-0" aria-label="Remove item">
                                <i class="lni lni-close"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-warning">Your cart is empty.</div>
                    </div>
                </div>
                @endforelse
            </div>

            <div class="row mt-4">
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="left">
                        <div class="coupon">
                            <form action="#" target="_blank">
                                <input name="Coupon" placeholder="Enter Your Coupon">
                                <div class="button">
                                    <button class="btn">Apply Coupon</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="right">
                        <ul>
                            <li>Cart Subtotal<span>${{ number_format($subtotal, 2) }}</span></li>
                            <li>Shipping<span>Free</span></li>
                            <li class="last">Total<span>${{ number_format($subtotal, 2) }}</span></li>
                        </ul>
                        <div class="button">
                            <a href="#" class="btn">Checkout</a>
                            <a href="{{ route('home') }}" class="btn btn-alt">Continue shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>