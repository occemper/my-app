<?php

use App\Models\ProductType;
use App\Models\Warehouse;
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
        Schema::create('product_types', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->text('description');

            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreignIdFor(ProductType::class)->constrained();
            $table->foreignIdFor(Warehouse::class)->constrained();
        });

        Schema::dropColumns('products',['name']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['product_type_id']);
            $table->dropForeign(['warehouse_id']);
        });

        Schema::dropIfExists('product_types');
    }
};
