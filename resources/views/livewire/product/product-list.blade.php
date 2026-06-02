<div>

    @foreach($products as $product)
    <div class="single-product">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-4 col-12">
                <div class="product-image">
                    <img src="{{ $product->image; }}" alt="#">
                    <span class="sale-tag">-25%</span>
                    <div class="button">
                        <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-12">
                <div class="product-info">
                    <span class="category">{{ $product->category }}</span>
                    <h4 class="title">
                        <a href="product-grids.html">{{ $product->name }}</a>
                    </h4>
                    <ul class="review">
                        <li><i class="lni lni-star-filled"></i></li>
                        <li><i class="lni lni-star-filled"></i></li>
                        <li><i class="lni lni-star-filled"></i></li>
                        <li><i class="lni lni-star-filled"></i></li>
                        <li><i class="lni lni-star-filled"></i></li>
                        <li><span>5.0 Review(s)</span></li>
                    </ul>
                    <div class="price">
                        <span>${{ isset($product->price) ? $product->price : number_format($product->price, 2) }}</span>
                        <span class="discount-price">{{ isset($product->discount_price) ? '$' . number_format($product->discount_price, 2) : '' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>