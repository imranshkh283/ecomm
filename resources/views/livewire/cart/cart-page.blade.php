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
                @if(!$cartItems || $cartItems == null)

                <div class="text-center py-5">
                    <h4 class="mb-2">Your cart is empty</h4>
                    <p class="text-muted">Add some products to continue shopping.</p>
                    <a href="{{ url('/') }}" class="btn btn-primary mt-3">
                        Continue Shopping
                    </a>
                </div>

                @else
                @foreach($cartItems?->items ?? [] as $cartItem)

                <div class="cart-single-list">
                    <div class="row align-items-center">

                        <div class="col-lg-1 col-md-1 col-12">
                            <a href="#">
                                <img src="{{ asset('storage/products/' . $cartItem->product->image) }}"
                                    alt="{{ $cartItem->product->name }}">
                            </a>
                        </div>

                        <div class="col-lg-4 col-md-3 col-12">
                            <h5 class="product-name">
                                <a href="#">{{ $cartItem->product->name }}</a>
                            </h5>
                        </div>

                        <div class="col-lg-2 col-md-2 col-12">
                            <div class="count-input d-flex align-items-center">
                                <button wire:click="increase({{ $cartItem->product_id }})"
                                    class="btn btn-sm btn-success">+</button>

                                <span class="mx-2 bold">{{ $cartItem->quantity }}</span>

                                <button wire:click="decrease({{ $cartItem->product_id }})"
                                    class="btn btn-sm btn-danger">-</button>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-2 col-12">
                            <p>${{ number_format($cartItem->price, 2) }}</p>
                        </div>

                        <div class="col-lg-2 col-md-2 col-12">
                            <p>${{ number_format($cartItem->price * $cartItem->quantity, 2) }}</p>
                        </div>

                        <div class="col-lg-1 col-md-2 col-12">
                            <button wire:click="remove({{ $cartItem->product_id }})"
                                class="remove-item btn btn-link p-0">
                                <i class="lni lni-close"></i>
                            </button>
                        </div>

                    </div>
                </div>

                @endforeach

                @endif

            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount">
                        <div class="row">
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
                    <!--/ End Total Amount -->
                </div>
            </div>
        </div>
    </section>
</div>