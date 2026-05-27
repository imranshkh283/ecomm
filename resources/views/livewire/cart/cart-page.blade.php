<div>
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