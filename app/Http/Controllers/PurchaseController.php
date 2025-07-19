<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\User;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases = Purchase::with('user')->get();
        return view('purchases.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('purchases.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'purchase_date' => 'required|date',
            'total_amount' => 'required|numeric',
        ]);

        Purchase::create($request->all());

        return redirect()->route('purchases.index')->with('success', 'Transaksi ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        return view('purchases.show', compact('purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchase $purchase)
    {
        $users = User::all();
        return view('purchases.edit', compact('purchase', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Purchase $purchase)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'purchase_date' => 'required|date',
            'total_amount' => 'required|numeric',
        ]);

        $purchase->update($request->all());

        return redirect()->route('purchases.index')->with('success', 'Transaksi diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        $purchase->delete();
        return redirect()->route('purchases.index')->with('success', 'Transaksi dihapus');
    }
}
