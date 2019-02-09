<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index')
                                    ->with('products', Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'image' => 'required|image',
            'price' => 'required',
            'description' => 'required'
        ]);
        
        //converting image into the string
        $image = $request->image;

        $image_new_name = time().$image->getClientOriginalName();

        $image->move('uploads/products',$image_new_name);

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => 'uploads/products/'.$image_new_name,
            'description' => $request->description
        ]);
      
        $product->save();

        Session::flash('success', 'Product has been created');
        return redirect()->route('products');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('products.edit')->with('product', Product::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'price' => 'required',
            'description' => 'required'
        ]);

        //find the product
        $product = Product::find($id);

        if($request->hasFile('image')){
            //converting image into the string
            $image = $request->image;

            $image_new_name = time().$image->getClientOriginalName();

            $image->move('uploads/products',$image_new_name);

            $product->image = 'uploads/products/'.$image_new_name;
        }
    
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
 
        $product->save();

        Session::flash('success', 'Product has been updated');
        return redirect()->route('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if(file_exists($product->image)){
            unlink($product->image);
        }

        $product->delete();

        Session::flash('success', 'This Product has been Deleted');

        return redirect()->back();
    }
}
