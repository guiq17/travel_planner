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
        Schema::create('packing_category_item', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('travel_id');
            $table->unsignedBigInteger('packing_category_id');
            $table->unsignedBigInteger('packing_item_id');
            $table->timestamps();

            $table->foreign('travel_id')->references('id')->on('travel');
            $table->foreign('packing_category_id')->references('id')->on('packing_categories');
            $table->foreign('packing_item_id')->references('id')->on('packing_items');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packing_category_item');
    }
};
