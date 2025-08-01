<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Stock;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'shop', 'stock'])->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $stocks = Stock::all();
        $shops = Shop::all();
        return view('products.create', compact('categories', 'stocks', 'shops'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'stock_id' => 'required|exists:stocks,id',
            'shop_id' => 'required|exists:shops,id',
            'price' => 'required|numeric',
        ]);

        Product::create([
            ...$request->all(),
            'created_by' => Auth::id()
        ]);

        return redirect()->route('products.index')->with('success', 'Produk ditambahkan');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
        $stocks = Stock::all();
        return view('products.edit', compact('product', 'stocks'));
        $shops = Shop::all();
        return view('products.edit', compact('product', 'shops'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'stock_id' => 'required|exists:stocks,id',
            'shop_id' => 'required|exists:shops,id',
            'price' => 'required|numeric',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Produk diperbarui');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk dihapus');
    }
}
