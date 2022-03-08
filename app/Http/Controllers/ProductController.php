<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view("sales.products.index", ['products' => $products]);
    }

    public function create()
    {
        return view("sales.products.create");
    }

    public function product_details()
    {
        return view("sales.products.product_details");
    }

    public function uploadImage($file)
    {
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        Image::make($file)
            ->resize(200, 200)
            ->save(storage_path() . '/app/public/images/' . $fileName);
        return $fileName;
    }

    public function store(Request $request)
    {



        try {

            $imageValidationRule = 'image|mimes:png,jpg,jpeg,gif|max:10000';
            // dd($request->isMethod('post'));
            if ($request->isMethod('post')) {
                $imageValidationRule = 'required|' . $imageValidationRule;
            }
            $request->validate([
                'name' => 'required|unique:products,name',
                'description' => 'required',
                'price' => 'required|numeric',
                'quantity' => 'required|numeric',
                'box_quantity' => 'required|numeric',
                'picture' => $imageValidationRule
            ]);

            Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'box_quantity' => $request->box_quantity,
                'picture' => $this->uploadImage(request()->file('picture')),
            ]);

            // $request->session()->flash('message', 'Task was successful!');
            return redirect()->route('products.index')->withMessage('Successfully Created!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
            // dd($e->getMessage());
        }
    }

    public function show(Product $product)
    {
        return view('sales.products.show', [
            'product' => $product
        ]);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('sales.products.edit', [
            'product' => $product
        ]);
    }

   

    public function update(Request $request, Product $product)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'price' => 'required|numeric',
                'quantity' => 'required|numeric',
                'box_quantity' => 'required|numeric',

            ]);

            $requestData = [
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'box_quantity' => $request->box_quantity
            ];

            if ($request->hasFile('picture')) {
                $requestData['picture'] = $this->uploadImage(request()->file('picture'));
            }

            $product->update($requestData);

            // $request->session()->flash('message', 'Task was successful!');
            return redirect()->route('products.show', ['product' => $product->id])->withMessage('Successfully Updated!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
            // dd($e->getMessage());
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index')->withMessage('Successfully Deleted!');
    }

    public function search(Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->search . '%')->get();
        return view('sales.products.index', [
            'products' => $products
        ]);
        return view('welcome', ['products' => $products]);
    }
    }
