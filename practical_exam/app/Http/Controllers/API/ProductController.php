<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        return Product::all();
    }
    
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer'
        ]);
        return Product::create($validated);
    }
    
    public function show($id) {
        return Product::findOrFail($id);
    }
    
    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return $product;
    }
    
    public function destroy($id) {
        return Product::destroy($id);
    }
    
}
