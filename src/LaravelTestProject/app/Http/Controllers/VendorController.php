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
}
