<div>
    <div class="row">
        @forelse($products as $product)
        <div class="col-lg-4 col-md-6 col-12 mb-4">
            <div class="single-product">
                <div class="product-image">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}">
                    <div class="button">
                        <button wire:click="$emitUp('addToCart', {{ $product->id }})" class="btn">
                            <i class="lni lni-cart"></i> Add to Cart
                        </button>
                    </div>
                </div>
                <div class="product-info">
                    <span class="category">{{ $product->category }}</span>
                    <h4 class="title">
                        <a href="#">{{ $product->name }}</a>
                    </h4>
                    <ul class="review">
                        @for($i = 1; $i <= 5; $i++)
                            <li><i class="lni {{ $i <= ($product->rating ?? 0) ? 'lni-star-filled' : 'lni-star' }}"></i></li>
                            @endfor
                            <li><span>{{ number_format($product->rating ?? 0, 1) }} Review(s)</span></li>
                    </ul>
                    <div class="price">
                        <span>${{ number_format($product->price, 2) }}</span>
                        @if(!empty($product->discount_price))
                        <span class="discount-price">${{ number_format($product->discount_price, 2) }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info">No products available.</div>
        </div>
        @endforelse
    </div>

    @if(method_exists($products, 'links'))
    <div class="row mt-4">
        <div class="col-12">
            {{ $products->links() }}
        </div>
    </div>
    @endif
</div>