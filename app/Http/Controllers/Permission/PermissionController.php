<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Visualizar permissões', ['only' => ['index']]);
        $this->middleware('permission:Cadastrar permissão', ['only' => ['create', 'store']]);
        $this->middleware('permission:Alterar permissão', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Excluir permissão', ['only' => ['destroy']]);
    }

    public function index()
    {
        $permissions = Permission::get();

        return view('permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('permission.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|unique:permissions,name',
            ]);

            Permission::create([
                'name' => $request->name
            ]);

            return redirect()->route('permissions.create')->with('success', 'Permissão cadastrada com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->route('permissions.create')->with('error', 'Erro ao cadastrar permissão. ' . $th->getMessage());
        }
    }

    public function edit(Permission $permission)
    {
        return view('permission.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        try {
            $request->validate([
                'name' => 'required|string|unique:permissions,name,' . $permission->id
            ]);

            $permission->update([
                'name' => $request->name
            ]);

            return redirect()->route('permissions.index')->with('success', 'Permissão alterada com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->route('permissions.index')->with('error', 'Erro ao alterar permissão. ' . $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $permission = Permission::findOrFail($id);
            $permission->delete();

            Session::flash('success', 'Permissão excluída com sucesso!');

            return true;
        } catch (\Exception $e) {
            Session::flash('error', 'Erro ao excluir permissão. ' . $e->getMessage());

            return false;
        }
    }
}
