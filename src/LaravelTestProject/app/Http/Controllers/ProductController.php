<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->get();

        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('products.show', compact('product'));
    }

    public function create(){
      $vendor_code = Vendor::pluck('vendor_code');
      return view('products.create', compact('vendor_code'));
    }

    public function store(ProductStoreRequest $request){
      $product = new Product();
      $product->product_name = $request->input('product_name');
      $product->price = $request->input('price');
      $product->vendor_code = $request->input('vendor_code');

      if($request->hasFile('image')){
        $image_path = $request->file('image')->store('public/products');
        $product->image_name = basename($image_path);
      }

      $product->save();

      return redirect("/products/{$product->id}");
    }
}
