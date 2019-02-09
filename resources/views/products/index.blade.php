@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
                <div class="panel-heading">
                    All Books
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Price</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($products->count()>0)
                                @foreach($products as $product)
                                    <tr>        
                                        <td>
                                            {{$product->name}} 
                                        </td>
                    
                                        <td>
                                            <img src="{{asset($product->image)}}" alt="{{$product->name}}" width="40px" height="40px">
                                        </td>
                                        
                                        <td>
                                            <label for="price">{{$product->price}}</label>
                                        </td>
                                        <td>
                                            <a 
                                                href="{{route('product.edit',['id' => $product->id])}}" 
                                                class="glyphicon glyphicon-pencil btn btn-outline-info"></a>
                                        </td>
                    
                                        <td>
                                            <a 
                                                href="{{route('product.delete',['id' => $product->id])}}" 
                                                class="glyphicon glyphicon-trash btn btn-outline-danger"></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <th colspan="4" class="text-center">No product published</th>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>   
    </div>
@endsection
