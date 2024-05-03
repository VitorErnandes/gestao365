<?php

namespace App\Http\Controllers\Access;

use Illuminate\Http\Request;
use App\Models\User\User;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;

class AccessController extends Controller
{
    public function permissions()
    {
        $permissions = Permission::all();
        $users = User::all();

        return view('accessManager.permissions', compact('permissions', 'users'));
    }

    public function assignPermission(Request $request)
    {
        // Validação dos dados do formulário
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'permission_id' => 'required|exists:permissions,id',
        ]);

        // Encontra o usuário
        $user = User::findOrFail($validatedData['user_id']);

        // Encontra a permissão
        $permission = Permission::findOrFail($validatedData['permission_id']);

        // Atribui a permissão ao usuário
        $user->givePermissionTo($permission);

        // Redireciona de volta com uma mensagem de sucesso
        return redirect()->back()->with('success', 'Permissão atribuída com sucesso ao usuário.');
    }

    public function showCreatePermissionForm()
    {
        return view('accessManager.create');
    }
}
