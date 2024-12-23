@extends('layout')
@section('title', 'E-commerce Website')
@section('content')
<style>
    .thumbnail_product{
        background-position: center;
        background-size: cover;
        height: 300px;
        width: 100%;
    }
</style>
    <!-- Hero Section -->
    <div class="container mt-4">
        <div class="text-center py-5 bg-light rounded">
            <h1>Welcome to MyShop</h1>
            <p class="lead">Find the best products at the best prices!</p>
        </div>
    </div>

    <!-- Product Grid -->
    <div class="container mt-4">
        <h2 class="text-center mb-4">Our Products</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- Product 1 -->
            @foreach($products as $product)
            <div class="col-md-4 col-sm-6">
                <div class="card h-100">
                    <div class="thumbnail_product" style="background-image: url({{$product->image}});"></div>
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Rp{{number_format($product->price, 0, ",", ".")}}</p>
                        <a href="{{ route('product.click', $product->id) }}" 
                            target="_blank"
                            class="btn btn-primary">Beli Sekarang</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row mt-4">
            <div class="col-12">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection