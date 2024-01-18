<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    
    public function index(){

        $products = Product::all();

        //sending data to view 
       return view('products.index' , ['products'=> $products]); 
    }

    public function create(){
        return view("products.create");
    }

    // store data into database
    public function store(Request $request){

       // Validate DATA
        $data = $request->validate([

            'name' => "required",
            "qty" => "required|numeric",
            "price" => "required|decimal:0,2",
            "description" => "nullable",     

        ]);

        $newProduct = Product::create($data);
        return redirect(route("product.index"));

    }

    // edit function for data 
    public function edit(Product $product){
        return view('products.edit', ['product' => $product]);

    }

    //update function

    public function update(Product $product, Request $request){
        // Validate DATA
        $data = $request->validate([

            'name' => "required",
            "qty" => "required|numeric",
            "price" => "required|decimal:0,2",
            "description" => "nullable",     

        ]);
        $product->update($data);
        return redirect(route('product.index'))->with('success', 'Product Updated Successfully');
    }

    // destroy function to delete data from database
    public function destroy(Product $product){
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Product Deleted Successfully');


    } 
}
