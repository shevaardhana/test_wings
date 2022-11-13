<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return response()->json([
            'message' => 'Successfully get data',
            'products' => $products
        ], 200);
    }

    public function detail($id)
    {
        $product = Product::findOrFail($id);

        return view('pages.detail')->with([
            'product' => $product
        ]);
    }
}
