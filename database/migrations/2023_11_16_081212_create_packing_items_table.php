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
        Schema::create('packing_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('packing_category_id');
            $table->string('name');
            $table->timestamps();

            $table->foreign('packing_category_id')->references('id')->on('packing_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packing_items');
    }
};
