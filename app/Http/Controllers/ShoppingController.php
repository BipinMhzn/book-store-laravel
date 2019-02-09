<?php

namespace App\Http\Controllers;

use App\Product;
use Cart;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use Closure;

class ShoppingController extends Controller
{
    public function add_to_cart(){
        $product = Product::find(request()->product_id);

        $cartItem = Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => request()->qty,
            'price' => $product->price
        ]);

        Cart::associate($cartItem->rowId, 'App\Product');

        Session::flash('success', 'Book has been added to a cart');

        return redirect()->back();
    }

    public function cart(){
        
        return view('cart');
    }

    public function cart_delete($id){
        Cart::remove($id);
        Session::flash('success', 'This book has been deleted from the cart');
        return redirect()->back();
    }

    public function incr($id, $qty){
        Cart::update($id, $qty+1);
        Session::flash('success', 'Book quantity has been increased by 1');
        return redirect()->back();
    }

    public function decr($id, $qty){
        Cart::update($id, $qty-1);
        Session::flash('success', 'Book quantity has been decreased by 1');
        return redirect()->back();
    }

    public function rapid_add($id){
        $product = Product::find($id);

        $cartItem = Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->price
        ]);

        Cart::associate($cartItem->rowId, 'App\Product');
        Session::flash('success', 'A book has been added to cart');
        return redirect()->back();
    }

    public function pay(){
        if(Auth::user()){
            Cart::destroy();
            Session::flash('success', 'You have paid for the product');
            Session::flash('info', 'You will get your books within one week');
            return redirect()->route('index');
        }
        else{
            Session::flash('info', 'You should be logged in in order to pay');
            return redirect()->back();
        }
  
    }
}
