<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Models\User\User;

class UserController extends User
{
  protected $table = 'users';

  public function index()
  {
    $users = User::all();
    return view('users.index', compact('users'));
  }

  public function create()
  {
    return view('users.create');
  }

  public function store(Request $request)
  {
    User::create($request->all());

    return redirect('/users');
  }

  public function destroys($id)
  {
    $user = User::findOrFail($id);
    $user->delete();

    return redirect('/users')->with('success', 'Usuário excluído com sucesso!');
  }

  public function edit($id)
  {
    $user = User::findOrFail($id);
    return view('users.edit', compact('users'));
  }
}
