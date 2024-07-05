<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use App\Models\Product\ProductsGroup;
use App\Models\Product\MeasurementUnit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
      'purchase_price' => 'required',
      'sale_price' => 'required',
      'stock_quantity' => 'required|integer|min:0',
      'minimum_stock' => 'required|integer|min:0',
      'image' => 'required|image|max:2048',
      'status' => 'required|boolean',
      'description' => 'required|string',
      'observation' => 'nullable|string',
    ]);

    $validatedData['purchase_price'] = str_replace(",", ".", str_replace(".", "", $request->purchase_price));
    $validatedData['sale_price'] = str_replace(",", ".", str_replace(".", "", $request->sale_price));

    $imagePath = 'assets/img/products';
    $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
    $request->file('image')->move(public_path($imagePath), $imageName);
    $validatedData['image'] = $imagePath . '/' . $imageName;

    try {
      DB::beginTransaction();

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
      $validatedData = $request->validate([
        'name' => 'required|string|max:255|min:4',
        'brand' => 'required|string|max:100',
        'ean' => 'required|string|max:50|unique:products,ean',
        'measurement_unit' => 'required|integer|exists:measurement_unit,id',
        'purchase_price' => 'required|numeric',
        'sale_price' => 'required|numeric',
        'stock_quantity' => 'required|integer|min:0',
        'minimum_stock' => 'required|integer|min:0',
        'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        'status' => 'required|boolean',
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

  public function destroy(Product $product)
  {
    try {
      $product->delete();

      Session::flash('success', 'Produto excluído com sucesso.');

      return true;
    } catch (\Exception $e) {
      Session::flash('error', 'Erro ao excluir produto. ' . $e->getMessage());

      return false;
    }
  }
}
