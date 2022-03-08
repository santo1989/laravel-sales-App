<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Quotation;
use Illuminate\Http\Request;
use App\Models\Pricelist;
use App\Models\Customer;
use App\Models\Order;

class QuotationController extends Controller
{

    public function index()
    {
        $quotations = Quotation::all();
        return view('sales.quotations.index', compact('quotations'));
    }


    public function create()
    {
        $products = Product::all();
        return view('sales.quotations.create', compact('products'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        Product::all();
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',

        ]);

        #store array
        $quotation = Quotation::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            // 'product_id' => $request->product_id->attach($request->product_id),
            // 'quantity' => $request->quantity->attach($request->quantity),
        ]);
        $products = $request->input('products', []);
        $quantities = $request->input('quantities', []);

        for ($product = 0; $product < count($products); $product++) {
            if ($products[$product] != '') {
                $quotation->products()->attach($products[$product], ['quantity' => $quantities[$product]]);
            }
        }

        return redirect()->route('welcome')->with('success', 'Quotation created successfully');
    }

    public function show(Quotation $quotation)
    {
        return view('sales.quotations.show', compact('quotation'));
    }


    public function edit(Quotation $quotation)
    {
        return view('sales.quotations.edit', compact('quotation'));
    }

    public function update(Request $request, Quotation $quotation)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
        ]);

        $quotation->update($request->all());

        return redirect()->route('quotations.index')
            ->with('success', 'Quotation updated successfully');
    }

    public function destroy(Quotation $quotation)
    {
        $quotation->delete();

        return redirect()->route('quotations.index')
            ->with('success', 'Quotation deleted successfully');
    }
}
