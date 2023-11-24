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
        Schema::table('souvenir_category_item', function (Blueprint $table) {
            $table->integer('souvenir_category_list_id')->after('travel_id');
            $table->integer('souvenir_item_id')->after('souvenir_category_list_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('souvenir_category_item', function (Blueprint $table) {
            $table->dropColumn('souvenir_category_list_id');
            $table->dropColumn('souvenir_item_id');
        });
    }
};
