<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $products = DB::table('products')->simplePaginate(20);


        return view('product.index', compact('products', 'user'));

    }

    public function show(Product $product)
    {

        return view('product.show', compact('product'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }


    public function update(Request $request, Product $product)
    {
        $user = auth()->user();
        $audit = Product::find($product->id);
        $product->update([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'amount' => $request->get('amount'),
        ]);
        $audit->users()->attach($user->id);

        return redirect()->route('product.index');
    }

    public function store(Request $request)
    {
        $product = new Product();

        $product->create([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'amount' => $request->get('amount'),
        ]);
        return redirect()->route('product.index');

    }

    public function destroy(Product $product)
    {
        $user = auth()->user();
        $audit = Product::find($product->id);
        $audit->users()->attach($user->id);
        $product->delete();
        return redirect()->back();

    }


}
