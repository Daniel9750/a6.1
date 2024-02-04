<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AdminProductController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Products - Online Store";
        $viewData["products"] = Product::all();
        return view('admin.product.index')->with("viewData", $viewData);
    }

    public function products(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
    
        $product = new Product;
    
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->image = 'default.png';

        $product->save();
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->extension(); 
            $imageName = $product->id . '_image.' . $extension; 
            $image->storeAs('public', $imageName); 
    
            $product->image = $imageName; 
        } 
        
        $product->save();
    
        return redirect()->route('admin.product.index')->with('success', 'Product created successfully');
    }
    
    
}