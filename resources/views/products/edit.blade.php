@extends('layouts.app')

@section('content')
    <div class="container">
        @include('includes.error')
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit a Book: {{$product->name}}
            </div>
    
            <div class="panel-body">
                <form action="{{route('product.update',['id' => $product->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
    
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                    </div>
     
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" class="form-control" value = {{$product->price}}>
                    </div>
    
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
    
                    <div class="form-group">
                        <label for="description">Description</label><br>
                        <textarea name="description" id="description" cols="30" rows="6" class="form-control">{{$product->description}}</textarea>
                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-success" type="submit" style="width: 100%;">Save Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
