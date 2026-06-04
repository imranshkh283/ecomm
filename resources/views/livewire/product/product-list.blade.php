<div>
    @forelse($products as $product)
    <div class="single-product mb-4">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-4 col-12">
                <div class="product-image">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}">
                    <span class="sale-tag">-25%</span>
                    <div class="button">
                        <button wire:click="$emitUp('addToCart', {{ $product->id }})" class="btn">
                            <i class="lni lni-cart"></i> Add to Cart
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-12">
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
    </div>
    @empty
    <div class="alert alert-info">No products available.</div>
    @endforelse

    @if(method_exists($products, 'links'))
    <div class="row mt-4">
        <div class="col-12">
            {{ $products->links() }}
        </div>
    </div>
    @endif
</div>