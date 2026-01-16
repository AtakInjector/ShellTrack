<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('property_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->string('image_path');                      // e.g. 'properties/123/photo-1.jpg'
            $table->unsignedSmallInteger('order')->default(0); // for sorting images
            $table->timestamps();
            
            $table->index('property_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('property_images');
    }
};