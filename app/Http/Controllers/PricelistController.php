<?php

namespace App\Http\Controllers;

use App\Models\Pricelist;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PricelistController extends Controller
{
    public function index()
    {
        $pricelists = Pricelist::latest()->get();
        return view("sales.pricelists.index", ['pricelists' => $pricelists]);
    }

    public function create()
    {
        return view("sales.pricelists.create");
    }

    public function store(Request $request)
    {

        try {
            $request->validate([
                'name' => 'required|unique:pricelists,name',
                'discount_percentage' => 'required|numeric',
                'minimum_order' => 'required|numeric'
            ]);

            Pricelist::create([
                'name' => $request->name,
                'discount_percentage' => $request->discount_percentage,
                'minimum_order' => $request->minimum_order,
            ]);

            // $request->session()->flash('message', 'Task was successful!');
            return redirect()->route('pricelists.index')->withMessage('Successfully Created!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
            // dd($e->getMessage());
        }
    }

    public function edit($id)
    {
        $pricelist = Pricelist::find($id);
        return view("sales.pricelists.edit", ['pricelist' => $pricelist]);
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|unique:pricelists,name,' . $id,
                'discount_percentage' => 'required|numeric',
                'minimum_order' => 'required|numeric'
            ]);

            $pricelist = Pricelist::find($id);
            $pricelist->name = $request->name;
            $pricelist->discount_percentage = $request->discount_percentage;
            $pricelist->minimum_order = $request->minimum_order;
            $pricelist->save();

            // $request->session()->flash('message', 'Task was successful!');
            return redirect()->route('pricelists.index')->withMessage('Successfully Updated!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
            // dd($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $pricelist = Pricelist::find($id);
            $pricelist->delete();

            // $request->session()->flash('message', 'Task was successful!');
            return redirect()->route('pricelists.index')->withMessage('Successfully Deleted!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
            // dd($e->getMessage());
        }
    }
}
