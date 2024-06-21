<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('code', 50)->unique();
                $table->string('name', 255);
                $table->text('description')->nullable();
                $table->string('brand', 100);
                $table->string('ean', 50)->unique();
                $table->foreignId('measurement_unit_id')->constrained();
                $table->decimal('purchase_price', 10, 2);
                $table->decimal('sale_price', 10, 2);
                $table->integer('stock_quantity');
                $table->integer('minimum_stock');
                $table->string('image')->nullable();
                $table->enum('status', ['active', 'inactive'])->default('active');
                $table->text('observation')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
