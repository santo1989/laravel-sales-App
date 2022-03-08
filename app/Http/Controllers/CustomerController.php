<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Pricelist;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers =  customer::latest()->get();
        return view('sales.customers.index',['customers'=> $customers]);
    }
    public function create()
    {
        return view("sales.customers.create");
    }
    public function store(Request $request){
        // dd(request()->all());
        try{
            $request->validate([
        
                'name'=> ['required','min:3'],
                'email'=> [''],
                'address'=> [''],
                'phone'=> ['required','min:11'],
            ]);
            customer::create([
                'name'=> $request->name,
                'email'=>$request->email,
                'address'=>$request->address,
                'phone'=>$request->phone,
                'pricelist_id'=>$request->pricelist_id
    
            ]);
            // $request->session()->flash('massage', 'Task was successful!');
            // return redirect()->route('customers.index')->with('massage','Task was sussesfull');
            return redirect()->route('customers.index')->withMessage('Successfully Created!');
            // dd('Hello');
            

        }
        catch(QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
            
            //dd($e->getMessage());

        }

        

        
    }

    public function edit($id){
        
        $customer = customer::find($id);
        $pricelists = Pricelist::all();
        return view("sales.customers.edit", ['customer' => $customer, 'pricelists'=>$pricelists]);
    }

    public function update(Request $request, Customer $customer)
    {
        try {
            
            $request->validate([
        
                'name'=> 'required|max:30',
                'email'=> 'required',
                'address'=> 'required',
                'phone'=> 'required|min:11'
            ]);

            // $customer = customer::find($id);
            
            $customer-> name= $request->name;
            $customer-> email= $request->email;
            $customer->address = $request->address;
            $customer->phone = $request->phone;
            $customer->pricelist_id = $request->pricelist_id;
            $customer->update();

// $request->session()->flash('message', 'Task was successful!');
            return redirect()->route('customers.index')->withMessage('Successfully Updated!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
            // dd($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $customer = customer::find($id);
            $customer->delete();

            // $request->session()->flash('message', 'Task was successful!');
            return redirect()->route('customers.index')->withMessage('Successfully Deleted!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
            // dd($e->getMessage());
        }
    }

}
