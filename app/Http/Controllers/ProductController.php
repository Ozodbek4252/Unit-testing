<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('front.products.index', compact('products'));
    }

    public function create()
    {
        return view('front.products.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'type' => 'required',
            'price' => 'required',
        ]);

        Product::create($data);

        return redirect('/products');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('front.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'name' => 'required',
            'type' => 'required',
            'price' => 'required',
        ]);

        Product::whereId($id)->update($data);

        return redirect('/products');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/products');
    }
}
