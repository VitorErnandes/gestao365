<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use App\Models\Product\ProductsGroup;
use App\Models\Product\MeasurementUnit;

class ProductController extends Controller
{
  public function index()
  {
    $products = Product::all();
    return view('products.index', compact('products'));
  }

  public function create()
  {
    $productsGroup = new ProductsGroup();
    $productsGroupList = $productsGroup->all();

    $unit = new MeasurementUnit();
    $unitList = $unit->all();

    return view('products.create', compact('productsGroupList', 'unitList'));
  }

  public function store(Request $request)
  {
    try {
      $request->validate([
        'name' => 'required|string|max:255|min:4',
        'brand' => 'nullable|string|max:100',
        'ean' => 'required|string|max:50|unique:products,ean',
        'measurement_unit' => 'required|integer|exists:measurement_unit,id',
        'purchase_price' => 'required|between:0,999999999.99',
        'sale_price' => 'required|between:0,999999999.99',
        'stock_quantity' => 'required|integer|min:0',
        'minimum_stock' => 'required|integer|min:0',
        'image' => 'nullable|string|max:255',
        'status' => 'required|boolean',
        'description' => 'required|string',
        'observation' => 'nullable|string',
      ]);

      Product::create([
        'name' => $request->name,
        'brand' => $request->brand,
        'ean' => $request->ean,
        'measurement_unit_id' => $request->measurement_unit,
        'purchase_price' => $request->purchase_price,
        'sale_price' => $request->sale_price,
        'stock_quantity' => $request->stock_quantity,
        'minimum_stock' => $request->minimum_stock,
        'image' => $request->image,
        'status' => $request->status,
        'description' => $request->description,
        'observation' => $request->observation
      ]);

      return redirect()->route('products.index')
        ->with('success', 'Produto criado com sucesso.');
    } catch (\Throwable $th) {
      echo $th;
      // return redirect()->route('products.index')
      //   ->with('error', 'Erro ao salvar produto. ' . $th->getMessage());
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
        'measurement_unit' => 'required|integer|exists:measurement_unit,id',
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
