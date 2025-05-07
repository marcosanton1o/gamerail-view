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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('image')->default('images/default.png');
            $table->text('description')->nullable();
            $table->float('price');
            $table->date('release_date')->nullable();
            $table->integer('total_sales')->default(0);
            
            $table->foreignId('manufacturer_id')->constrained('companies')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('prod_categories')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
