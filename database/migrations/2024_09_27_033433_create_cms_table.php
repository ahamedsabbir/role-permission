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
        Schema::create('cms', function (Blueprint $table) {
            $table->id();
            $table->string('page');
            $table->string('section');
            $table->string('slug');
            $table->string('item')->nullable();
            $table->string('title')->nullable();
            $table->string('title_two')->nullable();
            $table->longText('description')->nullable();
            $table->longText('description_two')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->string('image')->nullable();
            $table->string('image_two')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms');
    }
};
