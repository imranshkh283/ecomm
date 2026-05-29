<div class="single-product">
    <div class="product-image">
        <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}" />
        @if($product->badge)
        <span class="{{ $product->badge_class ?? 'sale-tag' }}">{{ $product->badge }}</span>
        @endif
        <div class="button">
            <button
                wire:click="addToCart({{ $product->id }})"
                wire:loading.attr="disabled"
                class="btn"><i class="lni lni-cart"></i> Add to Cart</button>
        </div>
    </div>
    <div class="product-info">
        <span class="category">{{ $product->category }}</span>
        <h4 class="title"><a href="#">{{ $product->name }}</a></h4>
        <ul class="review">
            @for($i = 1; $i <= 5; $i++)
                <li><i class="lni {{ $i <= $product->rating ? 'lni-star-filled' : 'lni-star' }}"></i></li>
                @endfor
                <li><span>{{ number_format($product->rating, 1) }} Review(s)</span></li>
        </ul>
        <div class="price">
            <span>${{ number_format($product->price, 2) }}</span>
            @if($product->discount_price)
            <span class="discount-price">${{ number_format($product->discount_price, 2) }}</span>
            @endif
        </div>
    </div>
</div>