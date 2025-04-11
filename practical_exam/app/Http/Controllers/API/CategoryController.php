<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        return Category::all();
    }
    
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|unique:categories',
        ]);
        return Category::create($validated);
    }
    
    public function show($id) {
        return Category::findOrFail($id);
    }
    
    public function update(Request $request, $id) {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return $category;
    }
    
    public function destroy($id) {
        return Category::destroy($id);
    }
    
}
