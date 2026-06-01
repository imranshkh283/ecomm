@extends('layouts.app')

@section('content')
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">{{ $menu->name }}</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                    <li>{{ $menu->name }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="category-section section pt-5">
    <div class="container">
        @if($menu->children->isNotEmpty())
        <div class="row mb-5">
            <div class="col-12">
                <div class="section-title text-center">
                    <h2 class="title">Explore {{ $menu->name }}</h2>
                    <p>Browse top categories inside {{ $menu->name }}.</p>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            @foreach($menu->children as $child)
            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="category-card p-4 border rounded h-100">
                    <h4 class="mb-3"><a href="{{ $child->href }}">{{ $child->name }}</a></h4>
                    <p class="text-muted">Shop the latest {{ strtolower($child->name) }} collection.</p>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <div class="row mb-4">
            <div class="col-12">
                <div class="section-title">
                    <h2 class="title">Products in {{ $menu->name }}</h2>
                </div>
            </div>
        </div>

        @if($products->isEmpty())
        <div class="row">
            <div class="col-12">
                <div class="alert alert-info">No products are currently available for this category.</div>
            </div>
        </div>
        @else
        <div class="row">
            @foreach($products as $product)
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="single-product">
                    <div class="product-image">
                        <a href="#">
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" />
                        </a>
                    </div>
                    <div class="product-info">
                        <span class="category">{{ $product->category }}</span>
                        <h4 class="title"><a href="#">{{ $product->name }}</a></h4>
                        <div class="price">${{ number_format($product->price, 2) }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>
@endsection
