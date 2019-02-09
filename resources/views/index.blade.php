@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            @foreach($products as $product)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-img-top">
                            <img src="{{asset($product->image)}}" alt="book" width="300px" height="400px" class="rounded mx-auto d-block">
                        </div>

                        <div class="card-body">
                            <a href="{{ route('product.single', ['id' => $product->id]) }}" style="text-decoration:none;">
                                <h5 class="card-title h3 text-center" >
                                    {{ $product->name }}
                                </h5>
                            </a>
                            <div class="card-text h3 text-center text-muted">Rs. {{ $product->price }}</div>
                        </div>

                        <a href="{{route('cart.rapid.add', ['id' => $product->id])}}" class="btn btn-primary btn-md">
                            <span class="text">Add to Cart</span>
                        </a>

                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="row">
            <div class="col">
                <div class="text-center">
                    <div class="col-lg-12">{{ $products->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection