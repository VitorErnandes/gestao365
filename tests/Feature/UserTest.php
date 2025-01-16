<?php

namespace Tests\Feature;

use App\Http\Controllers\User\UserController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mockery;

class UserTest extends TestCase
{
  public function testStoreSuccess()
  {
    // Simular a requisição
    $request = new Request([
      'name' => 'John Doe',
      'email' => 'john@example.com',
      'password' => 'password123',
      'roles' => ['admin', 'editor'],
    ]);

    // Criar um mock para o modelo User
    $userMock = Mockery::mock(User::class);
    $userMock
      ->shouldReceive('syncRoles')
      ->once()
      ->with(['admin', 'editor']);

    // Substituir a chamada para o Hash::make
    Hash::shouldReceive('make')
      ->once()
      ->with('password123')
      ->andReturn('hashed-password');

    // Simular a criação do usuário
    User::shouldReceive('create')
      ->once()
      ->with([
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => 'hashed-password',
      ])
      ->andReturn($userMock);

    // Chamar o método store do controlador
    $response = $this->call('POST', '/user/store', $request->all());

    // Verificar se o redirecionamento ocorreu com a mensagem de sucesso
    $response->assertRedirect()->assertSessionHas('success', 'Usuário cadastrado com sucesso!');
  }

  public function testStoreEmailAlreadyExists()
  {
    // Simular a requisição com e-mail duplicado
    $request = new Request([
      'name' => 'John Doe',
      'email' => 'john@example.com',
      'password' => 'password123',
      'roles' => ['admin'],
    ]);

    // Simular uma QueryException de e-mail duplicado
    User::shouldReceive('create')->andThrow(
      new \Illuminate\Database\QueryException('', [], new \Exception(), ['errorInfo' => [null, 1062]])
    );

    $response = $this->call('POST', '/user/store', $request->all());

    // Verificar se o redirecionamento ocorreu com a mensagem de erro de e-mail duplicado
    $response->assertRedirect()->assertSessionHas('error', 'Este endereço de e-mail já está em uso.');
  }
}
