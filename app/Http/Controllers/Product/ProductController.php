<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index()
  {
    $products = Product::all();
    return view('products.index', compact('products'));
  }

  public function create()
  {
    return view('products.create');
  }

  public function edit($id)
  {
    $product = Product::find($id);
    return view('products.edit', compact('product'));
  }
}
