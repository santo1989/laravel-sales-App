<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Pricelist;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('products')->latest()->get();

        return view('sales.orders.index', compact('orders'));
    }

    // public function create()
    // {
    //     return view("sales.orders.create");
    // }

    public function create()
    {
        $products = Product::all();
        $check = 0;
        return view('sales.orders.create', compact('products', 'check'));
    }

    public function store(Request $request)
    {
        $latitude = request()->input('latitude');
        $longitutde = request()->input('longitude');
        // $request->validate([

        // ]);
        // dd($request);
        // dd($request->newCustomer);
        if ($request->newCustomer == 1) {
            Customer::create([
                'name' => $request->customer_name,
                'email' => $request->customer_email,
                'address' => $request->address,
                'phone' => $request->phone,
                'pricelist_id' => 1,
                'orderCount' => 1
            ]);
        }
        // $order = Order::create([
        //     'customer_name' => $request->customer_name,
        //     'customer_email' => $request->customer_email,
        //     'address' => $request->address,
        //     'phone' => $request->phone,
        //     'status' => $request->status,
        //     'payment_method' => $request->payment_method,
        //     'user_id' => $request->user_id
        // ]);

        $commercialCutomer = Pricelist::where('name', 'Commercial Customer')->first();
        // dd($commercialCutomer->minimum_order);
        $customerToUpdate = Customer::where('email', $request->customer_email)->first();
        $customerToUpdate->orderCount = $customerToUpdate->orderCount + 1;
        if ($customerToUpdate->orderCount >=  $commercialCutomer->minimum_order) {
            $customerToUpdate->pricelist_id = $commercialCutomer->id;
        }
        $customerToUpdate->update();




        $totalAmount = 0;
        $products = $request->input('products', []);
        $quantities = $request->input('quantities', []);

        for ($i = 0; $i < count($products); $i++) {
            // dd($products[$i]);

            $productToUpdate = Product::find($products[$i]);
            // dd($productToUpdate);
            $productToUpdate->quantity = $productToUpdate->quantity - $quantities[$i];
            if ($productToUpdate->quantity < 50) {
                $notification = Notification::create([
                    'name' => "Low stock of product: " . $productToUpdate->name,
                    'status' => 'unread',
                    'link' => 'http://127.0.0.1:8000/notification/' . $productToUpdate->id,
                    'color' => 'gray'
                ]);
                $notification->link = $notification->link . '/' . $notification->id;
                $notification->update();
            }
            $totalAmount = $productToUpdate->price * $quantities[$i];
            $productToUpdate->update();
        }

        $order = Order::create([
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'address' => $request->address,
            'phone' => $request->phone,
            'latitude' => $request->latitude,
            'longitutde' => $request->longitutde,
            'status' => $request->status,
            'payment_method' => $request->payment_method,
            'user_id' => $request->user_id,
            'totalAmount' => $totalAmount
        ]);


        // dd($products);

        for ($product = 0; $product < count($products); $product++) {
            if ($products[$product] != '') {
                $order->products()->attach($products[$product], ['quantity' => $quantities[$product]]);
            }
        }
        return redirect()->route('orders.index');
    }


    // public function store(Request $request)
    // {

    //     // $request->validate([

    //     // ]);
    //     // dd($request);
    //     // dd($request->newCustomer);
    //     if ($request->newCustomer == 1) {
    //         Customer::create([
    //             'name' => $request->customer_name,
    //             'email' => $request->customer_email,
    //             'address' => $request->address,
    //             'phone' => $request->phone,
    //             'pricelist_id' => 1,
    //             'orderCount' => 1
    //         ]);
    //     }
    //     $order = Order::create([
    //         'customer_name' => $request->customer_name,
    //         'customer_email' => $request->customer_email,
    //         'address' => $request->address,
    //         'phone' => $request->phone,
    //         'status' => $request->status,
    //         'payment_method' => $request->payment_method,
    //         'user_id' => $request->user_id,
    //         // 'latitude' => $latude,
    //         // 'longitude' => $longitude,

    //     ]);

    //     $commercialCutomer = Pricelist::where('name', 'Commercial Customer')->first();
    //     // dd($commercialCutomer->minimum_order);
    //     $customerToUpdate = Customer::where('email', $request->customer_email)->first();
    //     $customerToUpdate->orderCount = $customerToUpdate->orderCount + 1;
    //     if ($customerToUpdate->orderCount >=  $commercialCutomer->minimum_order) {
    //         $customerToUpdate->pricelist_id = $commercialCutomer->id;
    //     }
    //     $customerToUpdate->update();




    //     $totalAmount = 0;
    //     $products = $request->input('products', []);
    //     $quantities = $request->input('quantities', []);

    //     for ($i = 0; $i < count($products); $i++) {
    //         // dd($products[$i]);

    //         $productToUpdate = Product::find($products[$i]);
    //         // dd($productToUpdate);
    //         $productToUpdate->quantity = $productToUpdate->quantity - $quantities[$i];
    //         $totalAmount = $productToUpdate->price * $quantities[$i];
    //         $productToUpdate->update();
    //     }

    //     $order = Order::create([
    //         'customer_name' => $request->customer_name,
    //         'customer_email' => $request->customer_email,
    //         'address' => $request->address,
    //         'phone' => $request->phone,
    //         'status' => $request->status,
    //         'payment_method' => $request->payment_method,
    //         'user_id' => $request->user_id,
    //         'totalAmount' => $totalAmount,
    //     ]);


    //     // dd($products);

    //     for ($product=0; $product < count($products); $product++) {
    //         if ($products[$product] != '') {
    //             $order->products()->attach($products[$product], ['quantity' => $quantities[$product]]);
    //         }
    //     }
    //     return redirect()->route('orders.index');
    // }

    public function search(Request $request)
    {
        // dd($request->email);
        $customerSearch = Customer::where('email', $request->email)->first();
        $products = Product::all();
        $found = 1;
        if (isset($customerSearch->name)) {
            $found = 2;
        }
        // return view('sales.orders.create', compact('products'));
        return view('sales.orders.create', ['customer' => $customerSearch, 'products' => $products, 'check' => 1, 'found' => $found]);
    }
}
