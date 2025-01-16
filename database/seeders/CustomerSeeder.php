<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('customers')->insert([
      // Cliente físico
      [
        'customer_type' => 1,
        'name' => 'João Silva',
        'cep' => '12345678',
        'address' => 'Rua das Flores',
        'number_address' => '123',
        'neighborhood' => 'Centro',
        'city' => 'São Paulo',
        'uf' => 'SP',
        'observation' => 'Cliente preferencial',
        'birthday_date' => '1990-05-20',
        'gender' => 1,
        'cpf' => '12345678901',
        'rg' => '1234567',
        'marital_status' => 1,
        'created_at' => now(),
        'updated_at' => now(),
      ],
      // Cliente jurídico
      [
        'customer_type' => 2,
        'name' => 'Empresa XYZ Ltda.',
        'cep' => '87654321',
        'address' => 'Avenida Brasil',
        'number_address' => '456',
        'neighborhood' => 'Industrial',
        'city' => 'Curitiba',
        'uf' => 'PR',
        'observation' => null,
        'fantasy_name' => 'XYZ Comércio',
        'company_founding' => '2010-01-15',
        'cnpj' => '12345678000199',
        'ie' => '987654321',
        'created_at' => now(),
        'updated_at' => now(),
      ],
    ]);
  }
}
