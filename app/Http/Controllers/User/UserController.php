<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\User\User;
use Spatie\Permission\Models\Role;

class UserController extends User
{
  protected $table = 'users';

  public function index()
  {
    $users = User::get();
    return view('users.index', ['users' => $users]);
  }

  public function create()
  {
    $roles = Role::pluck('name', 'name')->all();

    return view('users.create', [
      'roles' => $roles,
    ]);
  }

  public function store(Request $request)
  {
    try {
      $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'password' => 'required|string|min:6',
        'roles' => 'required',
      ]);

      $request['password'] = Hash::make($request['password']);

      $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request['password']),
      ]);

      $user->syncRoles($request->roles);

      return redirect()
        ->back()
        ->with('success', 'Usuário cadastrado com sucesso!');
    } catch (QueryException $e) {
      if ($e->errorInfo[1] == 1062) {
        return redirect()
          ->back()
          ->with('error', 'Este endereço de e-mail já está em uso.');
      } else {
        return redirect()
          ->back()
          ->with('error', 'Erro ao cadastrar usuário.');
      }
    }
  }

  public function destroyUser($id)
  {
    try {
      $user = User::findOrFail($id);
      $user->delete();

      Session::flash('success', 'Usuário excluído com sucesso!');

      return true;
    } catch (\Exception $e) {
      Session::flash('error', 'Erro ao excluir usuário: ' . $e->getMessage());

      return false;
    }
  }

  public function edit($id)
  {
    $user = User::find($id);
    $roles = Role::pluck('name', 'name')->all();
    $userRoles = $user->roles->pluck('name', 'name')->all();
    return view('users.edit', ["user" => $user, "roles" => $roles, "userRoles" => $userRoles]);
  }

  public function updateUser(Request $request, $id)
  {
    $users = User::all();

    try {
      $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255' . $id,
        'roles' => 'required'
      ]);

      $user = User::findOrFail($id);

      $user->name = $request->name;
      $user->email = $request->email;

      $user->save();
      $user->syncRoles($request->roles);

      return redirect()
        ->route('users.index', compact('users'))
        ->with('success', 'Usuário atualizado com sucesso!');
    } catch (QueryException $e) {
      if ($e->errorInfo[1] == 1062) {
        return redirect()
          ->route('users.index', compact('users'))
          ->with('error', 'Este endereço de e-mail já está em uso.');
      } else {
        return redirect()
          ->route('users.index', compact('users'))
          ->with('error', 'Erro ao atualizar usuário.');
      }
    }
  }

  public function editPassword($id)
  {
    $user = User::find($id);
    return view('users.editPassword', compact('user'));
  }

  public function updatePassword(Request $request, $id)
  {
    $users = User::all();

    try {
      $request->validate([
        'password' => 'required|string|min:6',
      ]);

      User::where('id', $id)->update(['password' => Hash::make($request->password)]);

      return redirect()
        ->route('users.index', compact('users'))
        ->with('success', 'Senha do usuário atualizada com sucesso!');
    } catch (\Exception $e) {
      return redirect()
        ->route('users.index', compact('users'))
        ->with('error', 'Erro ao atualizar senha do usuário.');
    }
  }
}
