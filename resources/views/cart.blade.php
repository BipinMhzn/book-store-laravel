@extends('layouts.app')

@section('content')

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
                In Your Shopping Cart: <span> {{Cart::content()->count()}} items</span>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Image</th>
                        <th scope="col" class="text-center">Price</th>
                        <th scope="col" class="text-center">Quantity</th>
                        <th scope="col" class="text-center">Delete</th>
                        <th scope="col" class="text-center">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(Cart::content() as $pdt)
                        <tr>        
                            <td class="text-center">
                                <label for="name">{{ $pdt->name }}</label>
                            </td>
        
                            <td class="text-center">
                                <img src="{{ asset($pdt->model->image) }}" alt="" width="40px" height="40px">
                            </td>
                            
                            <td class="text-center">
                                <label for="price">Rs. {{ $pdt->price }}</label>
                            </td>
            
                            <td class="text-center">
                                <a href="{{ route('cart.decr', ['id' => $pdt->rowId, 'qty' => $pdt->qty ]) }}" class="btn btn-outline-primary">-</a>
                                <input title="Qty" type="number" value="{{ $pdt->qty }}" max='99' min= '1' readonly>
                                <a href="{{ route('cart.incr', ['id' => $pdt->rowId, 'qty' => $pdt->qty]) }}" class="btn btn-outline-primary">+</a>
                            </td>

                            <td class="text-center">
                                <a 
                                    href="{{ route('cart.delete', ['id' => $pdt->rowId ]) }}" 
                                    class="glyphicon glyphicon-trash btn btn-outline-danger"></a>
                            </td class="text-center">

                            <td class="text-center">Rs. {{ $pdt->total() }}</td>
                        </tr>
                    @endforeach
                    
                    @if(Cart::content()->count() == 0)
                        <tr>
                            <th colspan="6" class="text-center">No product in cart</th>
                        </tr>
                    @else
                        <tr>
                            <th colspan="4" class="text-center"></th>
                            <th class="text-center">Total Price:</th>
                            <td class="text-center">Rs. {{ Cart::total() }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    
    @if(!Cart::content()->count() == 0)
        <div class="text-center gap">
            <a href="{{ route('cart.pay') }}" class=" btn btn-success btn-lg">Pay for Products
            </a>
        </div>
    @endif
</div>
@endsection