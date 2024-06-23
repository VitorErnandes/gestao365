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

  public function store(Request $request)
  {
    try {
      $request->validate([
        'code' => 'required|string|max:50|unique:products,code',
        'name' => 'required|string|max:255|min:4',
        'brand' => 'nullable|string|max:100',
        'ean' => 'required|string|max:50|unique:products,ean',
        'measurement_unit_id' => 'required|integer|exists:measurement_units,id',
        'purchase_price' => 'required|numeric|min:0',
        'sale_price' => 'required|numeric|min:0',
        'stock_quantity' => 'required|integer|min:0',
        'minimum_stock' => 'required|integer|min:0',
        'image' => 'nullable|string|max:255',
        'status' => 'required|in:active,inactive',
        'description' => 'required|string',
        'observation' => 'nullable|string',
      ]);

      Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'status' => $request->status
      ]);

      return redirect()->route('products.index')
        ->with('success', 'Produto criado com sucesso.');
    } catch (\Throwable $th) {
      return redirect()->route('products.index')
        ->with('error', 'Erro ao salvar produto. ' . $th->getMessage());
    }
  }

  public function edit($id)
  {
    $product = Product::find($id);
    return view('products.edit', compact('product'));
  }

  public function update(Request $request, Product $product)
  {
    try {
      $request->validate([
        'code' => 'required|string|max:50|unique:products,code',
        'name' => 'required|string|max:255|min:4',
        'brand' => 'nullable|string|max:100',
        'ean' => 'required|string|max:50|unique:products,ean',
        'measurement_unit_id' => 'required|integer|exists:measurement_units,id',
        'purchase_price' => 'required|numeric|min:0',
        'sale_price' => 'required|numeric|min:0',
        'stock_quantity' => 'required|integer|min:0',
        'minimum_stock' => 'required|integer|min:0',
        'image' => 'nullable|string|max:255',
        'status' => 'required|in:active,inactive',
        'description' => 'required|string',
        'observation' => 'nullable|string',
      ]);

      $product->update($request->all());

      return redirect()->route('products.index')
        ->with('success', 'Produto alterado com sucesso.');
    } catch (\Throwable $th) {
      return redirect()->route('products.index')
        ->with('error', 'Erro ao alterar produto. ' . $th->getMessage());
    }
  }
}
