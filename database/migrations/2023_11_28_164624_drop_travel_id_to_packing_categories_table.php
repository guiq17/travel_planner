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
        Schema::table('packing_categories', function (Blueprint $table) {
            $table->dropForeign(['travel_id']);
            $table->dropColumn('travel_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('packing_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('travel_id');
            $table->foreign('travel_id')->references('id')->on('travel');
        });
    }
};
