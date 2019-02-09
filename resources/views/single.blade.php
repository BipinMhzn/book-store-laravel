@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
       <div class="col">
            <img src="{{ asset($product->image) }}" alt="" height="400px" width="300px">
       </div>
       <div class="col-8">
            <div class="row py-3 px-lg-5">
                <h1 class="h1">{{ $product->name }}</h1>
            </div>
            <div class="row py-3 px-lg-5">
                <p class="product-details-info-text">{{$product->description }}</p>
            </div>
            <div class="row py-3 px-lg-5">
                <div class="h3 text-muted">Rs. {{ $product->price}}</div>
            </div>
            <div class="row py-3 px-lg-5">
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                 
                        <div class="row">
                            <div class="col">
                                <input type="number" value="1" name="qty" min='1' max="99" class="form-control">
                            </div>

                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <div class="col">
                                <button type="submit" class="btn btn-info btn-md">
                                        <span class="glyphicon glyphicon-shopping-cart"></span>  Add to Cart
                                </button>
                            </div>               
                        </div>
                </form>
           </div>
       </div>
   </div>
@endsection