<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use App\Models\Product\ProductsGroup;
use App\Models\Product\MeasurementUnit;
use Illuminate\Support\Facades\DB;

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
    $request->merge(['measurement_unit_id' => $request->measurement_unit]);

    $validatedData = $request->validate([
      'name' => 'required|string|max:255|min:4',
      'brand' => 'required|string|max:100',
      'ean' => 'required|string|max:50|unique:products,ean',
      'measurement_unit_id' => 'required|integer|exists:measurement_unit,id',
      'purchase_price' => 'required|numeric|between:0,999999999.99',
      'sale_price' => 'required|numeric|between:0,999999999.99',
      'stock_quantity' => 'required|integer|min:0',
      'minimum_stock' => 'required|integer|min:0',
      'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
      'status' => 'required|boolean',
      'description' => 'required|string',
      'observation' => 'nullable|string',
    ]);

    try {
      DB::beginTransaction();

      $imagePath = 'assets/img/products';
      $image = $request->file('image');
      $imageName = time() . '.' . $image->getClientOriginalExtension();
      $image->move(public_path($imagePath), $imageName);
      $validatedData['image'] = $imagePath . '/' . $imageName;

      Product::create($validatedData);

      DB::commit();

      return redirect()->route('products.index')
        ->with('success', 'Produto criado com sucesso.');
    } catch (\Exception $e) {
      DB::rollBack();

      return redirect()->route('products.index')
        ->with('error', 'Erro ao salvar produto. ' . $e->getMessage());
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
