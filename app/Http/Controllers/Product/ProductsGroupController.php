<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\ProductsGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        try {
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
        } catch (\Throwable $th) {
            return redirect()->route('products-group.index')
                ->with('error', 'Erro ao salvar grupo de produtos. ' . $th->getMessage());
        }
    }

    public function edit(ProductsGroup $productsGroup)
    {
        return view('products-group.edit', compact('productsGroup'));
    }

    public function update(Request $request, ProductsGroup $productsGroup)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'status' => 'required|boolean',
            ]);

            $productsGroup->update($request->all());

            return redirect()->route('products-group.index')
                ->with('success', 'Grupo de produtos alterado com sucesso.');
        } catch (\Throwable $th) {
            return redirect()->route('products-group.index')
                ->with('error', 'Erro ao alterar grupo de produtos. ' . $th->getMessage());
        }
    }

    public function destroy(ProductsGroup $productsGroup)
    {
        try {
            $productsGroup->delete();

            Session::flash('success', 'Grupo de produtos excluído com sucesso.');

            return true;
        } catch (\Exception $e) {
            Session::flash('error', 'Erro ao excluir grupo de produto. ' . $e->getMessage());

            return false;
        }
    }
}
