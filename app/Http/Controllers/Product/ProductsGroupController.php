<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\ProductsGroup;
use Illuminate\Http\Request;

class ProductsGroupController extends Controller
{
    public function index()
    {
        $productsGroup = ProductsGroup::all();
        return view('products-group.index', compact('productsGroup'));
    }

    public function create()
    {
        return view('products-group.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:4',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        ProductsGroup::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return redirect()->route('products-group.index')
            ->with('success', 'Grupo de produtos criado com sucesso.');
    }

    public function edit(ProductsGroup $ProductsGroup)
    {
        return view('products-group.edit', compact('ProductsGroup'));
    }

    public function update(Request $request, ProductsGroup $ProductsGroup)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        $ProductsGroup->update($request->all());

        return redirect()->route('products-group.index')
            ->with('success', 'Grupo de produtos atualizado com sucesso.');
    }

    public function destroy(ProductsGroup $ProductsGroup)
    {
        $ProductsGroup->delete();

        return redirect()->route('products-group.index')
            ->with('success', 'Grupo de produtos excluído com sucesso.');
    }
}
