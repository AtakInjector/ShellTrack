<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 public function up(): void
{
    Schema::create('properties', function (Blueprint $table) {
        $table->id();

        // owner_id: required, cascade delete
        $table->foreignId('owner_id')
              ->constrained('owners')
              ->onDelete('cascade');

        // category_id: optional, set to NULL if category deleted
        $table->foreignId('category_id')
              ->nullable()                    // ← MUST come BEFORE constrained()
              ->constrained('categories')
              ->onDelete('set null');

        // agent_id: optional, set to NULL if agent (user) deleted
        $table->foreignId('agent_id')
              ->nullable()                    // ← MUST come BEFORE constrained()
              ->constrained('users')
              ->onDelete('set null');

        $table->text('description')->nullable();
        $table->string('address');
        $table->string('city');
        $table->string('country');

        $table->unsignedBigInteger('price');               // or ->decimal('price', 12, 2) if you want cents
        $table->unsignedTinyInteger('bedrooms')->default(0);
        $table->unsignedTinyInteger('bathrooms')->default(0);

        $table->string('property_type')->nullable();
        $table->date('listing_date')->nullable();

        $table->timestamps();

        // indexes (optional but good)
        $table->index(['city', 'price']);
        $table->index('property_type');
    });
}

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};