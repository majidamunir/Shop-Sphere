<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image',
            'description' => 'nullable|string',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;

        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('images', 'public');
        }

        $product->save();
        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        return view('product.view', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image',
            'description' => 'nullable|string',
        ]);

        $product->name = $request->name;
        $product->description = $request->description;

        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('images', 'public');
        }

        $product->save();
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    // Method for customers to select products
    public function select(Product $product)
    {
        // Logic for customer to select product
        return redirect()->route('products.show', $product);
    }
}
