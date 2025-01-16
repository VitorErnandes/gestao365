<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('customers', function (Blueprint $table) {
      $table->id();
      $table->timestamps();

      // Campos comuns
      $table->string('customer_type'); // 1 = Físico, 2 = Jurídico
      $table->string('name');
      $table->string('cep');
      $table->string('address');
      $table->string('number_address');
      $table->string('neighborhood');
      $table->string('city');
      $table->string('uf', 2);
      $table->text('observation')->nullable();

      // Campos de cliente físico
      $table->date('birthday_date')->nullable();
      $table->enum('gender', [0, 1])->nullable(); // 0 = Feminino, 1 = Masculino
      $table
        ->string('cpf')
        ->unique()
        ->nullable();
      $table->string('rg')->nullable();
      $table->enum('marital_status', [0, 1, 2])->nullable(); // 0 = Solteiro, 1 = Casado, 2 = Divorciado

      // Campos de cliente jurídico
      $table->string('fantasy_name')->nullable();
      $table->date('company_founding')->nullable();
      $table
        ->string('cnpj')
        ->unique()
        ->nullable();
      $table->string('ie')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('customers');
  }
};
