<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function show($id) {
        $vendor = Vendor::find($id);
        
        $products = $vendor->products;

        return view('vendors.show', compact('vendor', 'products'));
    }

    public function create() {
      return view('vendors.create');
    }

    public function store(Request $request){
      $request->validate([
        'vendor_code' => 'required|integer|min:0|unique:vendors,vendor_code',
        'vendor_name' => 'required|max:255',
      ]);

      $vendor = new Vendor();
      $vendor->vendor_code = $request->input('vendor_code');
      $vendor->vendor_name = $request->input('vendor_name');
      $vendor->save();

      return redirect("/vendors/$vendor->id");
    }
}
