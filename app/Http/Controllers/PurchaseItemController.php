<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseItem;
use App\Models\Product;
use App\Models\Purchase;

class PurchaseItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchaseItems = PurchaseItem::with(['product', 'purchase'])->get();
        return view('purchase_items.index', compact('purchaseItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $purchases = Purchase::all();
        return view('purchase_items.create', compact('products', 'purchases'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'purchase_id' => 'required|exists:purchases,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric',
        ]);

        PurchaseItem::create($request->all());

        return redirect()->route('purchase-items.index')->with('success', 'Item pembelian ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(PurchaseItem $purchaseItem)
    {
        return view('purchase_items.show', compact('purchaseItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchaseItem $purchaseItem)
    {
        $products = Product::all();
        $purchases = Purchase::all();
        return view('purchase_items.edit', compact('purchaseItem', 'products', 'purchases'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PurchaseItem $purchaseItem)
    {
        $request->validate([
            'purchase_id' => 'required|exists:purchases,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric',
        ]);

        $purchaseItem->update($request->all());

        return redirect()->route('purchase-items.index')->with('success', 'Item pembelian diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseItem $purchaseItem)
    {
        $purchaseItem->delete();
        return redirect()->route('purchase-items.index')->with('success', 'Item pembelian dihapus');
    }
}
