<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::get();

        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|unique:roles,name',
            ]);

            Role::create([
                'name' => $request->name
            ]);

            return redirect()->route('roles.create')->with('success', 'Regra cadastrada com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->route('roles.create')->with('error', 'Erro ao cadastrar regra. ' . $th->getMessage());
        }
    }

    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        try {
            $request->validate([
                'name' => 'required|string|unique:roles,name,' . $role->id
            ]);

            $role->update([
                'name' => $request->name
            ]);

            return redirect()->route('roles.index')->with('success', 'Regra alterada com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->route('roles.index')->with('error', 'Erro ao alterar regra. ' . $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $role = Role::findOrFail($id);
            $role->delete();

            Session::flash('success', 'Regra excluída com sucesso!');

            return true;
        } catch (\Exception $e) {
            Session::flash('error', 'Erro ao excluir regra. ' . $e->getMessage());

            return false;
        }
    }

    public function addPermissionToRole($id)
    {
        $permissions = Permission::get();
        $role = Role::findOrFail($id);
        $rolePermissions = DB::table('role_has_permissions')->where('role_id', $role->id)->pluck('permission_id', 'permission_id')->all();

        return view('roles.role-permission', [
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions
        ]);
    }

    public function givePermissionToRole(Request $request, $id)
    {
        try {
            $request->validate([
                'permission' => 'required'
            ]);

            $role = Role::findOrFail($id);
            $role->syncPermissions($request->permission);

            return redirect()->back()->with('success', 'Permissões adicionadas à regra.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Erro ao adicionar permissão à regra. ' . $th->getMessage());
        }
    }
}
