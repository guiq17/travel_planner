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
        Schema::create('souvenir_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('souvenir_category_id');
            $table->string('name');
            $table->integer('quantity');
            $table->integer('price')->nullable();
            $table->string('url')->nullable();
            $table->string('contents')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('souvenir_category_id')->references('id')->on('souvenir_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('souvenir_items');
    }
};
